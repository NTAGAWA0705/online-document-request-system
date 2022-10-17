<?php

use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StudentController;
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
    return view('dashboard.dashboard');
})->name('home')->middleware('auth');

Route::get('/login', [LoginController::class, 'renderLogin'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginUser'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

// Students
Route::get('/students', [StudentController::class, 'renderStudentList'])->name('all_students')->middleware('auth');
Route::get('/students/new', [StudentController::class, 'renderNewStudentForm'])->name('new_student')->middleware('auth');
Route::post('/students/new', [StudentController::class, 'createStudent'])->middleware('auth');

Route::get('/requests', [DocumentRequestController::class, 'renderAllRequests'])->name('requests')->middleware('auth');
Route::get('/requests/transcripts/new', [DocumentRequestController::class, 'newTranscriptForm'])->name('newTranscriptForm')->middleware('auth');
Route::post('/requests/transcripts/new', [DocumentRequestController::class, 'createNewTranscript'])->middleware('auth');

// users
Route::get('/users', [UserController::class, 'renderAllUsers'])->name('allUsers')->middleware('auth');
Route::get('/settings', [UserController::class, 'renderSettingPage'])->name('settings')->middleware('auth');
Route::get('/users/new', [UserController::class, 'create'])->name('new_user')->middleware('auth');



// testing
Route::get('/mail', [MailController::class, 'html_mail']);
