<?php

use App\Http\Controllers\SiteSettingController;
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




// Signup Route 
Route::view('/index', 'frontend.index')->name('index');
Route::view('/signup', 'frontend.signup')->name('signup');
Route::view('/login', 'frontend.login')->name('login');
Route::post('/signup-submit', [SignupController::class, 'signup'])->name('signup-submit');
Route::post('/login-submit', [SignupController::class, 'login'])->name('login-submit');


// Backend/Admin Route
Route::get('/dashboard', [SiteSettingController::class, 'index'])->name('dashboard');
Route::post('/site-setting-submit', [SiteSettingController::class, 'siteSettingSubmit'])->name('site-setting-submit');
Route::get('/site-setting', [SiteSettingController::class, 'siteSetting'])->name('site-setting');
Route::post('/site-setting-submit', [SiteSettingController::class, 'siteSettingSubmit'])->name('site-setting-submit');


// Route::get('/login', 'LoginController@showLoginForm')->name('login.form');
// Route::post('/login', 'LoginController@login')->name('login');