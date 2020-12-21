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
}
