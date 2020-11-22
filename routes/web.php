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
Route::post('/logincustomer', [LogInController::class,'loginCustomer'])->name('login.customer');

//staff login validation
Route::post('/loginstaff', [LogInController::class,'loginStaff'])->name('login.staff');

Route::get('/breakfastcustomer', function () {
    return view('breakfast-selection-customer');
});

Route::get('/amenitiescustomer', function () {
    return view('amenities-customer');
});


Route::get('/homecustomer', function () {
    return view('home-page-customer');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
