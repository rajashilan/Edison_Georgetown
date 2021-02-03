<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;
use Response;
use Input;
use Carbon\Carbon;

class CustomerController extends Controller
{
  public function showCustomers(Request $request){
    $customers = Customer::all();
    return view('view-customer-page', compact('customers'));
  }


  public function showCustomerBreakfast(Request $request){
    $bookingID = $request->session()->get('booking_id');

    $customer = DB::table('customers')->where('booking_id', $bookingID)->first();

    $room_number = $customer->room_number;

    $room_mates = DB::select('select * from customers where room_number = ? and status = ?', [$room_number, 1]);

    $breakfastSelection = DB::select('
    select T1.*, T2.*
    from breakfast_selections T1
    inner join
    (select *
    from breakfast_groups
    order by sequence) T2
    on T1.group_id = T2.breakfast_group_id
    ');

    $groupID = DB::select('
    select *  from breakfast_groups
    ');

    return view('guest-breakfast-selection-page', compact('room_mates', 'breakfastSelection', 'groupID'));
  }

  // public function showCustomerBreakfastTrial(Request $request){
  //   //handle customer retrieval
  //   $bookingID = $request->session()->get('booking_id');
  //
  //   $customer = DB::table('customers')->where('booking_id', $bookingID)->first();
  //
  //   $room_number = $customer->room_number;
  //
  //   $room_mates = DB::select('select * from customers where room_number = ? and status = ?', [$room_number, 1]);
  //
  //   //handle breakfast selection retrieval
  //   //$breakfastSelection = DB::table('breakfast_selections')->orderBy('group_id')->get();
  //
  //   $breakfastSelection = DB::select('
  //   select T1.*, T2.*
  //   from breakfast_selections T1
  //   inner join
  //   (select *
  //   from breakfast_groups
  //   order by sequence) T2
  //   on T1.group_id = T2.breakfast_group_id
  //   ');
  //
  //   $groupID = DB::select('
  //   select *  from breakfast_groups
  //   ');
  //
  //   return view('guest-breakfast-selection-page-trial', compact('room_mates', 'breakfastSelection', 'groupID'));
  // }

  public function submitCustomerBreakfastSelection(Request $request){
    $data = request()->get('selection');
    $data_array = json_decode($data, true);
    $sqlFood = '';
    $submit;

    $orderDate = request()->get('orderDate');
    $formatDate = Carbon::createFromFormat('d/m/Y', $orderDate)->format('Y-m-d');
    $orderTime = request()->get('orderTime');
    $date = "$formatDate $orderTime:00";
    $location = request()->get('location');
    $i = 0;

    //if the submitted date request is present in the database for the submitted customer id
    //run a for loop and for each customer id
    //use the for loop to go thru customer_breakfast_orders table
    //if customer id is the same, delete the row
    //once done, enter new record


    foreach($data_array as $key => $value){
      //id
      foreach ($value as $keyvalue => $food) {
        //food selection id
        $numFood = count($value);
        if(++$i === $numFood){
          $sqlFood.= $food;
          $i = 0;
        } else {
        $sqlFood.= $food . ',';
        }
      }
      // echo $key . " => " . $sqlFood;
      // echo "</br>";

       $submit = DB::insert('insert into customer_breakfast_orders (booking_id, breakfast_selection_id, status, breakfast_location, booking_date_time) values (?,?,?,?,?)',
       [$key, $sqlFood, 0, $location, $date]);
      $sqlFood = '';
    }

    if($submit){
      return redirect()->back()->with('success', 'Breakfast selection sent successfully.');
    }

    return redirect()->back()->with('fail', 'Failed to send breakfast selection.');
  }


  public function showBreakfastRecords(){
    $breakfastRecords = DB::select('select * from customer_breakfast_orders');
    //food is from breakfast selections to get food name based on id
    $food = DB::select('select breakfast_selection_id, item_name from breakfast_selections');
    $customers = DB::select('select booking_id, room_number from customers');
    $countCompleted = 0;
    $countPending = 0;
    //from breakfast orders
    $breakfastSelections = DB::select('
      select food.*, customer.*
      from customer_breakfast_orders food
      inner join
      (select *
      from customers) customer
      on food.booking_id = customer.booking_id
      where food.status = 0
    ');

    $room_numbers = DB::select('
      select food.*, customer.*
      from customer_breakfast_orders food
      inner join
      (select *
      from customers) customer
      on food.booking_id = customer.booking_id
      where food.status = 0
      group by customer.room_number
    ');

    foreach($breakfastRecords as $records){
    if($records->status == 1){
      $countCompleted += 1;
    }
  }

  foreach($breakfastRecords as $records){
  if($records->status == 0){
    $countPending += 1;
  }
}
    return view('breakfast-records-page', compact('breakfastRecords', 'customers', 'food', 'countCompleted', 'countPending', 'room_numbers', 'breakfastSelections'));
  }

  public function submitBreakfastRecords(Request $request, $room_number){
    $userIDs = DB::select('select booking_id from customers where room_number = ?', [$room_number]);
    foreach($userIDs as $id){
      $completed = DB::update('update customer_breakfast_orders set status = 1 where booking_id = ? ', [$id->booking_id]);
    }

    return redirect()->back();
  }

}
