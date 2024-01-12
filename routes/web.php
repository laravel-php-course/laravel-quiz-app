<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserAuthController;
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
//TODO combine resend code in register and login to one ctrl
//TODO Add throttle middleware to needed routes
//TODO Add view all teachers and un accepted teachers ui
//TODO Style navbar correctly
//TODO add template for admin profile
//TODO اضافه کردن روت لاگین برای دبیران و ثبت نام انها با گرفتن همه ثبت نام از دبیران نوشتن ولیدیشن مناسب برای کدملی و گرفتن ایمیل و موبایل بطور همزمان و داشتن رادیو بات برای تعیین نوع احراز هویت با ایمیل یا موبایل اضافه کردن تمپلیت جدید برای ثبت نام دبیران پیامک
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

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.auth.show.login');
    Route::post('/login', [AdminController::class, 'handleLogin'])->name('admin.auth.login');
    Route::post('/verification', [AdminController::class,'handleVerificationCode'])->name('admin.auth.verification.code');
    Route::post('/resendcode', [AdminController::class , 'handleResendCode'])->name('admin.auth.resend.code');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/teachers/show', [AdminController::class, 'dashboard'])->name('admin.manage.teachers.show');
});

//Route::get('/test/throttle', function (\Illuminate\Http\Request $request) {
//    dd($request);
//})->middleware('throttle:2,1');
