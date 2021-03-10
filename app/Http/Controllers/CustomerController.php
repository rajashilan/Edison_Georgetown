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
    //dd($remarks);

    //for $remarks
    //create a separate table named remarks
    //show all previous breakfast selections with date as the separation
    //show remarks and status for each customer name

    $booking_date = DB::select('
      select food.*, customer.*
      from customer_breakfast_orders food
      inner join
      (select *
      from customers) customer
      on food.booking_id = customer.booking_id
      where customer.room_number = ?
      order by booking_date_time ASC
    ', [$room_number]);

    $unique_date = DB::select('
    select distinct CAST(booking_date_time as DATE) booking_date_time from customer_breakfast_orders where booking_id = ?', [$bookingID]);

    //dd($unique_date);

    return view('guest-breakfast-selection-page', compact('room_mates', 'breakfastSelection', 'groupID', 'booking_date', 'unique_date'));
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
    $bookingID = $request->session()->get('booking_id');

    $updateSameDay = DB::select('select booking_id from customer_breakfast_orders where booking_id = ? and booking_date_time between ? and ?', [$bookingID, "$formatDate 00:00:00", "$formatDate 23:59:59"]);

    if($updateSameDay){
      $delete = DB::delete('delete from customer_breakfast_orders where booking_date_time between ? and ?', ["$formatDate 00:00:00", "$formatDate 23:59:59"]);
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


         $submit = DB::insert('insert into customer_breakfast_orders (booking_id, breakfast_selection_id, breakfast_status, breakfast_location, booking_date_time) values (?,?,?,?,?)',
         [$key, $sqlFood, 0, $location, $date]);
        $sqlFood = '';
      }


         // $submit = DB::update('update customer_breakfast_orders set breakfast_selection_id = ?, status = ?, breakfast_location = ?, booking_date_time = ? where booking_date_time between ? and ?',
         // [$sqlFood, 0, $location, $date, "$formatDate 00:00:00", "$formatDate 23:59:59"]);


         // $delete = DB::delete('delete from customer_breakfast_orders where booking_date_time between ? and ?', ["$formatDate 00:00:00", "$formatDate 23:59:59"]);
         // $submit = DB::insert('insert into customer_breakfast_orders (booking_id, breakfast_selection_id, status, breakfast_location, booking_date_time) values (?,?,?,?,?)',
         // [$key, $sqlFood, 0, $location, $date]);

         //$sqlFood = '';


    } else {

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


         $submit = DB::insert('insert into customer_breakfast_orders (booking_id, breakfast_selection_id, breakfast_status, breakfast_location, booking_date_time) values (?,?,?,?,?)',
         [$key, $sqlFood, 0, $location, $date]);
        $sqlFood = '';
      }

    }

    if($submit){
      return redirect()->back()->with('success', 'Breakfast selection sent successfully.');
    }

    return redirect()->back()->with('fail', 'Failed to send breakfast selection.');
  }

//group cards by date of orders
//show rooms with orders on that date
//show the customers in that room

//foreach booking date
//foreach room that has that same booking date
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
      where food.breakfast_status = 0
      order by booking_date_time ASC
    ');

    $booking_date = DB::select('
      select food.*, customer.*
      from customer_breakfast_orders food
      inner join
      (select *
      from customers) customer
      on food.booking_id = customer.booking_id
      where food.breakfast_status = 0
      group by CAST(booking_date_time as DATE)
      order by booking_date_time ASC
    ');

    foreach($breakfastRecords as $records){
    if($records->breakfast_status == 1){
      $countCompleted += 1;
    }
  }

  foreach($breakfastRecords as $records){
  if($records->breakfast_status == 0){
    $countPending += 1;
  }
}
    // dd($breakfastSelections);
    return view('breakfast-records-page', compact('breakfastRecords', 'customers', 'food', 'countCompleted', 'countPending', 'booking_date', 'breakfastSelections'));
  }

  public function submitBreakfastRecords(Request $request, $id){
    //dd($request->remark);
    // $userIDs = DB::select('select booking_id from customers where room_number = ?', [$room_number]);
    // foreach($userIDs as $id){
    //   // $completed = DB::update('update customer_breakfast_orders set status = 1, remark = ? where booking_id = ? ', [$remark, $id->booking_id]);
    //   $completed = DB::update('update customer_breakfast_orders set status = 1 where booking_id = ? ', [$id->booking_id]);
    // }
    $completed = DB::update('update customer_breakfast_orders set breakfast_status = 1, remark = ? where id = ? ', [$request->remark, $id]);
    return redirect()->back();
  }

}
