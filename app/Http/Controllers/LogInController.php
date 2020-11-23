<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogInController extends Controller
{

  //redirect user to a particular page based on the user type
  public function userSelect($user){
    if($user == 'customer'){
      return view('login', compact('user'));
    } elseif($user == 'staff'){
      return view('login', compact('user'));
    }
  }

  //customer login validation and page redirect
  public function loginCustomer(Request $request){
    if($request->bookingID == 123 && $request->password == 123){
      $customerName = "HeeHee";
      return view('home-page-customer', compact('customerName'));
    }
  }

  //staff login and page redirect
  public function loginStaff(Request $request){
    if($request->staffID == 123 && $request->password == 123){
      return view('home-page-staff');
    }
  }

}
