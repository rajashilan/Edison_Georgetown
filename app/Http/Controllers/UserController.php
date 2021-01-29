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
    $guestLogin = DB::select('select * from customers where booking_id = ? and password = ? and status = ?', [$bookingID, $password, 1]);

    //login guest if inputs are valid
    if($guestLogin){
      $request->session()->put('booking_id', $bookingID);
      return redirect('/breakfast');
    }
    else {
      return redirect()->back()->with('fail', 'Wrong Booking ID or password.');
    }
  }

  public function loginStaff(Request $request){

    //get staff inputs
    $staffID = $request->staffID;
    $password = $request->password;

    $staffLogin = DB::select('select * from users where staff_id = ? and password = ? and status = ?', [$staffID, $password, 1]);

    if($staffLogin){
      $request->session()->put('staff_id', $staffID);
      return redirect('/breakfastrecords');
    }
    else {
      return redirect()->back()->with('fail', 'Wrong Staff ID or password.');
    }
  }

  public function logoutGuest(Request $request){
    $request->session()->forget('booking_id');
    return view('home-page');
  }

  public function logoutStaff(Request $request){
    $request->session()->forget('staff_id');
    return view('home-page');
  }


  public function addCustomer(Request $request){
    $password = rand(100000,999999);
    if($request->name == '' || $request->room_number == '' || $request->booking_id == ''){
      return redirect()->back()->with('fail', 'Please fill up all required entries!');
    }

    if ($request->email == ''){
      $request->email = 'none';
    }

    if ($request->contact_number == ''){
      $request->contact_number = 'none';
    }

    $insert = DB::insert('insert into customers (customer_name, email, contact_number, room_number, booking_id, password, status) values (?, ?, ?, ?, ?, ?, ?)',
    [$request->name, $request->email, $request->contact_number, $request->room_number, $request->booking_id, $password, 1]);

    $name = $request->name;
    $email = $request->email;
    $contact_number = $request->contact_number;
    $room_number = $request->room_number;
    $bookingID = $request->booking_id;

    if($insert){
      $draftEmail = "Good day, " . $name . ".</br> </br> We are sending you this email to pass you information about your booking ID and your password,
                    which you could then use to log in to our customer service website.</br>
                    </br>
                    Here is your booking ID : " . $bookingID . "</br>" .
                    " and here is your password : " . $password . "</br>" .
                    "</br> Thank you.";
      return view('add-customer-page', compact('name', 'email', 'contact_number', 'room_number', 'bookingID', 'password', 'draftEmail'))->with('success', 'Successfully added. Please send an email to the guest.');
    } else {
      return redirect()->back()->with('fail', 'Failed to add Guest');
    }
  }
}
