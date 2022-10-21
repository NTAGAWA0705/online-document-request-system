<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentRequestController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentRequestDocumentController;
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


Route::get('/', [DashboardController::class, 'create'])->name('home')->middleware('auth');

Route::get('/login', [LoginController::class, 'renderLogin'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginUser'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

// Students
Route::get('/students', [StudentController::class, 'renderStudentList'])->name('all_students')->middleware('auth');
Route::get('/students/new', [StudentController::class, 'renderNewStudentForm'])->name('new_student')->middleware('auth');
Route::post('/students/new', [StudentController::class, 'createStudent'])->middleware('auth');

Route::get('/requests', [DocumentRequestController::class, 'renderAllRequests'])->name('requests')->middleware('auth');
Route::get('/requests/tracker/{request_id}', [DocumentRequestController::class, 'renderTracker']);
Route::get('/requests/transcripts/new', [DocumentRequestController::class, 'newTranscriptForm'])->name('newTranscriptForm')->middleware('auth');
Route::post('/requests/transcripts/new', [DocumentRequestController::class, 'createNewTranscript'])->middleware('auth');

Route::get('/student-requests', [DocumentRequestController::class, 'viewStudentRequests'])->middleware('auth');
Route::post('/approve-student-request', [DocumentRequestController::class, 'approveDocuments'])->middleware('auth');

Route::get('/my-documents', [DocumentsController::class, 'showUserDocuments'])->name('myDocuments')->middleware('auth');
// users
Route::get('/users', [UserController::class, 'renderAllUsers'])->name('allUsers')->middleware('auth');
Route::get('/settings', [UserController::class, 'renderSettingPage'])->name('settings')->middleware('auth');
Route::get('/users/new', [UserController::class, 'create'])->name('new_user')->middleware('auth');
Route::post('/users/new', [UserController::class, 'store'])->middleware('auth');

Route::get('/settings', [UserController::class, 'renderUserUpdate'])->name('settings')->middleware('auth');
Route::post('/settings', [UserController::class, 'userUpdate'])->name('settings')->middleware('auth');

Route::get('/transcripts/{doc_id}', [DocumentsController::class, 'renderTranscript'])->name('download_transcript');

Route::get('/departments', [DepartmentController::class, 'all'])->name('departments');
Route::get('/departments/new', [DepartmentController::class, 'create'])->name('new_dept');
Route::post('/departments/new', [DepartmentController::class, 'store']);

Route::get('/courses', [CourseController::class, 'all'])->name('courses')->middleware('auth');
Route::get('/courses/new', [CourseController::class, 'create'])->name('new_course')->middleware('auth');
Route::post('/courses/new', [CourseController::class, 'store']);

Route::get('/grades/import', [GradeController::class, 'create'])->name('import_grades')->middleware('auth');
Route::post('/grades/import', [GradeController::class, 'store']);

// testing
Route::get('/mail', [MailController::class, 'html_mail']);
