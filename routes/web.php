<?php

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

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/logIn', function () {
    return view('LogIn');
})->name('logIn');
Route::get('/code', function () {
    return view('code');
})->name('code');
Route::get('/logOut', function () {
    session()->forget('profile');
    session()->forget('email');
    session()->forget('name');
    session()->forget('mobile');
    session()->forget('realName');
    return redirect()->route('home');
})->name('logOut');
Route::get('/resend', [UserAuthController::class , 'handleResend']);
Route::get('/resendLogin', [UserAuthController::class , 'handleResendLogin']);

Route::post('/register', [UserAuthController::class,'handleRegister'])->name('user.auth.register');
Route::post('/code', [UserAuthController::class,'handleCode'])->name('user.auth.code');
Route::post('/Login', [UserAuthController::class,'handleLogin'])->name('user.auth.login');
Route::post('/CodeLogin', [UserAuthController::class,'handleCodeLogin'])->name('user.auth.codeLogin');
