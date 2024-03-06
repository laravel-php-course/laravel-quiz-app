<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopicController;
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
//
Route::get('/', [SiteController::class, 'Home'])->name('home');
Route::get('/registration', [SiteController::class, 'registration'])->name('registration');

Route::get('/register', [UserAuthController::class, 'ShowRegisterForm'])->name('user.register');
Route::get('/logIn', [UserAuthController::class, 'ShowLogInForm'])->name('user.logIn');
Route::get('/code', [UserAuthController::class, 'ShowCodePage'])->name('user.code');
Route::get('/logOut', [UserAuthController::class, 'LogOut'])->name('user.logOut');
Route::get('/resendLogin', [UserAuthController::class , 'handleResendLogin'])->name('user.auth.resendLogin');
Route::get('/resend', [UserAuthController::class , 'handleResend'])->name('user.auth.resendShow');
Route::post('/resendRegister', [UserAuthController::class , 'handleResend'])->name('user.auth.resendRegister')->middleware('throttle:2,1');
Route::post('/resendLogin', [UserAuthController::class , 'handleResendLogin'])->name('user.auth.resendLogin')->middleware('throttle:2,1');
Route::post('/register', [UserAuthController::class,'handleRegister'])->name('user.auth.register');
Route::post('/code', [UserAuthController::class,'handleCode'])->name('user.auth.code');
Route::post('/Login', [UserAuthController::class,'handleLogin'])->name('user.auth.login');
Route::post('/CodeLogin', [UserAuthController::class,'handleCodeLogin'])->name('user.auth.codeLogin')->middleware('throttle:2,1');


Route::prefix('/teacher')->group(function () {
    /* GET */
    Route::get('/register', [TeacherAuthController::class, 'ShowRegisterForm'])->name('teacher.register');
    Route::get('/login', [TeacherAuthController::class, 'ShowLogInForm'])->name('teacher.logIn');
    Route::get('/dashboard', [TeacherAuthController::class, 'dashboard'])->middleware(['checkActiveTeacher', 'checkRole:teacher'])->name('teacher.dashboard');
    Route::get('add/quiz', [TeacherController::class, 'ShowQuizCreateForm'])->middleware(['checkActiveTeacher', 'checkRole:teacher'])->name('teacher.add.quiz');
    Route::get('/quiz/showAll', [TeacherController::class, 'ShowAllQuiz'])->middleware(['checkActiveTeacher', 'checkRole:teacher'])->name('teacher.show.all.quiz');
    Route::get('/edit/quiz/{quiz}', [TeacherController::class, 'ShowEdit'])->middleware(['checkActiveTeacher', 'checkRole:teacher'])->name('teacher.show.edit.quiz');

    /* POST */
    Route::post('/register', [TeacherAuthController::class,'handleRegister'])->name('teacher.auth.register');
    Route::get('/Logout', [TeacherAuthController::class,'handleLogout'])->name('teacher.auth.Logout');
    Route::post('/login', [TeacherAuthController::class,'handleRegister'])->name('teacher.auth.login');
    Route::post('/code', [TeacherAuthController::class,'handleCode'])->name('teacher.auth.code');
    Route::post('/resendRegister', [TeacherAuthController::class,'handleResendRegister'])->name('tar');
    Route::post('/resend', [TeacherAuthController::class,'handleResendLogin'])->name('teacher.auth.resendLogin');
    Route::post('/Login', [TeacherAuthController::class,'handleLogin'])->name('teacher.auth.login');
    Route::post('/CodeLogin', [TeacherAuthController::class,'handleCodeLogin'])->name('teacher.auth.codeLogin')->middleware('throttle:5,1');

});

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.auth.show.login');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/teachers/show/type/{type}', [AdminController::class, 'showAllTeachers'])->name('admin.all.teachers.show');
    Route::get('/teachers/showOne/{id}', [AdminController::class, 'showOneTeacher'])->name('admin.one.teacher.show');
    Route::get('/quiz/showAll', [AdminController::class, 'ShowAllQuiz'])->middleware([ 'checkRole:admin'])->name('admin.show.all.quiz');
    Route::get('add/quiz', [AdminController::class, 'ShowQuizCreateForm'])->middleware([ 'checkRole:admin'])->name('admin.add.quiz');
    Route::get('/logout', [AdminController::class, 'handleLogout'])->middleware('checkRole:admin')->name('admin.logout');
    Route::get('/edit/quiz/{quiz}', [AdminController::class, 'ShowEdit'])->middleware(['checkRole:admin'])->name('admin.show.edit.quiz');

    Route::resource('notes', NoteController::class);

    Route::post('/login', [AdminController::class, 'handleLogin'])->name('admin.auth.login');
    Route::post('/verification', [AdminController::class,'handleVerificationCode'])->name('admin.auth.verification.code');
    Route::post('/resendcode', [AdminController::class , 'handleResendCode'])->name('admin.auth.resend.code')->middleware('throttle:2,1');
    Route::post('/teachers/changeStatus', [AdminController::class, 'changeStatus'])->name('admin.change.status.teacher');
});

Route::prefix('/quiz')->group(function() {
   /* GET */
    Route::get('/exam/{quiz}', [QuizController::class, 'ShowExam'])->middleware('checkUser')->name('quiz.ShowExam');
    Route::get('/quiz/{quiz}', [QuizController::class, 'ShowDetail'])->name('quiz.quizDescription');
    Route::get('/all', [QuizController::class, 'Show'])->name('quiz.all');
    Route::get('/del/quiz/{quiz}', [QuizController::class, 'DeleteExam'])->name('quiz.DeleteExam');
    Route::get('/karname', [QuizController::class, 'showKarname'])->name('quiz.showKarname');

    /* POST */
    Route::post('/add', [QuizController::class, 'Create'])->middleware(['throttle:'.config("services.throttle.time").','.config("services.throttle.minute"), 'checkRole:teacher'])
    ->name('quiz.add');
    Route::post('/edit', [QuizController::class, 'handleEditQuiz'])->name('handle.edit.quiz');
    Route::post('/submit', [QuizController::class, 'handleSubmitQuiz'])->middleware('checkQuizTime' , 'checkUser')->name('quiz.submit');
});

Route::prefix('/topics')->group(function() {
    /* GET */
    Route::get('/all', [SiteController::class, 'ShowAllTopics'])->name('topics.all.form');
    Route::get('/all/filtered', [SiteController::class, 'ShowAllTopicsFiltered'])->name('topics.all.filtered');
    Route::get('/show/{id}', [SiteController::class, 'ShowTopic'])->name('topics.show.form');
    Route::get('/create', [SiteController::class, 'ShowCreateTopic'])->middleware('auth')->name('topics.create.form');
    Route::post('/create', [SiteController::class, 'HandleCreateTopic'])->middleware('auth')->name('topics.create.submit.form');
    Route::post('/addreplaylike', [SiteController::class, 'HandleReplayLike'])->middleware('auth')->name('topics.addreplaylike.submit');
    Route::post('/addreplayDislike', [SiteController::class, 'HandleReplayDisLike'])->middleware('auth')->name('topics.addReplayDisLike.submit');
    Route::get('/addreplay', [SiteController::class, 'HandleReplay'])->middleware('auth')->name('topics.add.replay');

    /* POST */
 });
