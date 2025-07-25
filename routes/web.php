<?php

use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PasswordResetController;

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

Route::view('/index', 'frontend.index')->name('index');
 Route::post('/logout', [SignupController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    // Signup Route 
    Route::view('/signup', 'frontend.signup')->name('signup');
    Route::view('/login', 'frontend.login')->name('login');
    Route::post('/signup-submit', [SignupController::class, 'signup'])->name('signup-submit');
    Route::post('/login-submit', [SignupController::class, 'login'])->name('login-submit');
   

    // Password reset routes
    Route::get('/password.request', [PasswordResetController::class, 'showRequestForm'])->name('password.request');
    Route::get('/password-reset', [PasswordResetController::class, 'showRequestForm']);
    Route::post('/password-reset-request', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password-reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password-reset/{token}', [PasswordResetController::class, 'reset'])->name('password.update');

});



// Backend/Admin Route
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [SiteSettingController::class, 'index'])->name('dashboard');
    Route::post('/site-setting-submit', [SiteSettingController::class, 'siteSettingSubmit'])->name('site-setting-submit');
    Route::get('/site-setting', [SiteSettingController::class, 'siteSetting'])->name('site-setting');
    Route::post('/site-setting-submit', [SiteSettingController::class, 'siteSettingSubmit'])->name('site-setting-submit');
    Route::resource('user-management', UserManagementController::class)->names([
        'index' => 'user-management.index',
        'create' => 'user-management.create',
        'store' => 'user-management.store',
        'show' => 'user-management.show',
        'edit' => 'user-management.edit',
        'update' => 'user-management.update',
        'destroy' => 'user-management.destroy',
    ]);
});


