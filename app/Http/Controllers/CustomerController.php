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
}
