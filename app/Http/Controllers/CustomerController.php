<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Customer;

class CustomerController extends Controller
{
  public function showCustomers(){
    $customers = Customer::all();
    return view('view-customer-page', compact('customers'));
  }

  public function showCustomerBreakfast(Request $request){
    $bookingID = $request->session()->get('booking_id');

    $customer = DB::table('customers')->where('booking_id', $bookingID)->first();

    $room_number = $customer->room_number;

    $room_mates = DB::select('select * from customers where room_number = ?', [$room_number]);

    return view('guest-breakfast-selection-page', compact('room_mates'));
  }
}
