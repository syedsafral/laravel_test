<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/forgot_password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/send_mail', [AuthController::class, 'sendMail'])->name('send.mail');
Route::get('/password_reset/{token}', [AuthController::class, 'resetPassword']);
Route::post('/password_reset', [AuthController::class, 'passwordReset'])->name('reset.password');
Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');
