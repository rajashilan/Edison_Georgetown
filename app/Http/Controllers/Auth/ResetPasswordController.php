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

    public function reset(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:customers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $customer = Customer::where('email', $request->email)
                      ->update(['password' => $request->password]);

          return redirect('/guest')->with('message', 'Your password has been changed!');
    }
}
