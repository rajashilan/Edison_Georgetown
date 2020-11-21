<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogInController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home-page');
});

Route::get('/bootstrap', function () {
    return view('index');
});

//user performs logins selection
Route::get('/{user}/userSelect', [LogInController::class,'userSelect'])->name('user.select');

//customer login validation
Route::post('/customerlogin', [LogInController::class,'customerLogin'])->name('customer.login');

Route::get('/breakfastcustomer', function () {
    return view('breakfast-selection-customer');
});


Route::get('/customerhome', function () {
    return view('customer-home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
