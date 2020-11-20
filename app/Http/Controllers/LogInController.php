<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogInController extends Controller
{

  public function userSelect($user){
    if($user == 'customer'){
      return view('login', compact('user'));
    } elseif($user == 'staff'){
      return view('login', compact('user'));
    }
  }

}
