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

Route::get('/homestaff', function () {
    return view('home-page-staff');
});

Route::get('/viewcustomer', function () {
    return view('view-edit-customer-records');
});

Route::get('/createcustomer', function () {
    return view('create-customer');
});


//bootstrap routes

Route::get('/bootstrap', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin-bootstrap.admin');
});

Route::get('/admin/buttons', function () {
    return view('admin-bootstrap.buttons');
});

Route::get('/admin/cards', function () {
    return view('admin-bootstrap.cards');
});

Route::get('/admin/charts', function () {
    return view('admin-bootstrap.charts');
});

Route::get('/admin/tables', function () {
    return view('admin-bootstrap.tables');
});

Route::get('/admin/utilities/animation', function () {
    return view('admin-bootstrap.utilities-animation');
});

Route::get('/admin/utilities/border', function () {
    return view('admin-bootstrap.utilities-border');
});

Route::get('/admin/utilities/color', function () {
    return view('admin-bootstrap.utilities-color');
});

Route::get('/admin/utilities/other', function () {
    return view('admin-bootstrap.utilities-other');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
