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
    $guestLogin = DB::select('select * from customers where booking_id = ? and password = ?', [$bookingID, $password]);

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

    $staffLogin = DB::select('select * from users where staff_id = ? and password = ?', [$staffID, $password]);

    if($staffLogin){
      return redirect('/staffhome');
    }
    else {
      dd("wrong entry");
    }
  }


  public function addCustomer(Request $request){
    $password = rand(100000,999999);
    $insert = DB::insert('insert into customers (customer_name, email, contact_number, room_number, booking_id, password, status) values (?, ?, ?, ?, ?, ?, ?)',
    [$request->name, $request->email, $request->contact_number, $request->room_number, $request->booking_id, $password, 1]);

    $name = $request->name;
    $email = $request->email;
    $contact_number = $request->contact_number;
    $room_number = $request->room_number;
    $bookingID = $request->booking_id;

    if($insert){
      return view('add-customer-page', compact('name', 'email', 'contact_number', 'room_number', 'bookingID', 'password'))->with('success', 'Successfully added. Please send an email to the guest.');
    } else {
      return redirect()->back()->with('fail', 'Failed to add Guest');
    }
  }
}
