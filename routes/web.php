<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

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

Route::get('/guesthome', function () {
    return view('guest-home-page');
});

Route::get('/staffhome', function () {
    return view('staff-home-page');
});

Route::get('/addcustomer', function () {
    return view('add-customer-page');
});

Route::get('/showcustomer', function () {
    return view('view-customer-page');
});

Route::get('/breakfastrecords', function () {
    return view('breakfast-records-page');
});

Route::get('/amenities', function () {
    return view('guest-amenities-page');
});

Route::get('/breakfast', function () {
    return view('guest-breakfast-selection-page');
});

Route::get('/{user}', [UserController::class, 'login'])->name('user.select');
Route::post('/guestlogin', [UserController::class, 'loginGuest'])->name('login.guest');
Route::post('/stafflogin', [UserController::class, 'loginStaff'])->name('login.staff');
Route::get('/addcustomer', [UserController::class, 'generatePassword']);
Route::post('/addcustomer', [UserController::class, 'addCustomer'])->name('add.customer');
Route::get('/showcustomer', [CustomerController::class, 'showCustomers']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
