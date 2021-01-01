<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/main', function () {
    return view('home-page');
});

Route::get('/guesthome', function () {
    return view('guest-home-page');
});

Route::get('/staffhome', function () {
    return view('staff-home-page');
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
