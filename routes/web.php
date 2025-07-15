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
    return view('frontend.index');
});




// User Route 
Route::view('/index', 'frontend.index')->name('index');
Route::view('/signup', 'frontend.signup')->name('signup');
Route::view('/login', 'frontend.login')->name('login');
Route::post('/signup-submit', [UserController::class, 'signup'])->name('signup-submit');
Route::post('/login-submit', [UserController::class, 'login'])->name('login-submit');


// Backend Route
Route::view('/dashboard', 'backend.dashboard')->name('dashboard');
