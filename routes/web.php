<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserAuthController;
use App\Models\Admin;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [SiteController::class, 'Home'])->name('home');
Route::get('/register', [UserAuthController::class, 'ShowRegisterForm'])->name('user.register');
Route::get('/logIn', [UserAuthController::class, 'ShowLogInForm'])->name('user.logIn');
Route::get('/code', [UserAuthController::class, 'ShowCodePage'])->name('user.code');
Route::get('/logOut', [UserAuthController::class, 'LogOut'])->name('user.logOut');
Route::get('/resendLogin', [UserAuthController::class , 'handleResendLogin'])->name('user.auth.resendLogin');
Route::get('/resend', [UserAuthController::class , 'handleResend'])->name('user.auth.resendShow');

Route::post('/resendRegister', [UserAuthController::class , 'handleResend'])->name('user.auth.resendRegister');
Route::post('/resendLogin', [UserAuthController::class , 'handleResendLogin'])->name('user.auth.resendLogin');
Route::post('/register', [UserAuthController::class,'handleRegister'])->name('user.auth.register');
Route::post('/code', [UserAuthController::class,'handleCode'])->name('user.auth.code');
Route::post('/Login', [UserAuthController::class,'handleLogin'])->name('user.auth.login');
Route::post('/CodeLogin', [UserAuthController::class,'handleCodeLogin'])->name('user.auth.codeLogin');
