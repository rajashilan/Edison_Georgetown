<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use App\Models\Customer;
use Hash;

class ResetPasswordController extends Controller
{
  // use ResetsPasswords;

    public function getPassword($token) {

       return view('auth.passwords.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:customers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('customers')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $customer = Customer::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('customers')->where(['email'=> $request->email])->delete();

          return redirect('/')->with('message', 'Your password has been changed!');
    }
}
