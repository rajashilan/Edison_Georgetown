<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
  public function login($user){
    if($user == 'guest'){
      return view('login-page', compact('user'));
    } else if($user =='staff'){
      return view('login-page', compact('user'));
    } else {
      return view('home-page');
    }
  }

  public function loginGuest(Request $request){

    //get booking ID and password from guest input
    $bookingID = $request->bookingID;
    $password = $request->password;

    //call stored procedure to select guest based on input
    $guestLogin = DB::select('call GetCustomerByBookingID(?,?)',
                array($bookingID, $password));

    //login guest if inputs are valid
    if($guestLogin){
      $request->session()->put('booking_id', $bookingID);
      return redirect('/guesthome');
    }
    else {
      dd("wrong entry");
    }
  }

  public function loginStaff(Request $request){

    //get staff inputs
    $staffID = $request->staffID;
    $password = $request->password;

    $staffLogin = DB::select('call GetStaffByID(?,?)',
                array($staffID, $password));

    if($staffLogin){
      return redirect('/staffhome');
    }
    else {
      dd("wrong entry");
    }
  }

  public function generatePassword(){
    $password = rand(100000,999999);
    return view('add-customer-page', compact('password'));
  }

  public function addCustomer(Request $request){
    $password = $request->password;
    $insert = DB::insert('insert into customers (name, email, contact_number, room_number, booking_id, password, status) values (?, ?, ?, ?, ?, ?, ?)',
    [$request->name, $request->email, $request->contact_number, $request->room_number, $request->booking_id, $password, 1]);

    if($insert){
      $success = true;
      return redirect()->back()->with('success');
    } else {
      $success = false;
      return redirect()->back()->with('success');
    }
  }
}
