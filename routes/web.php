<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
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
})->name('home');

Route::get('/login', [LoginController::class, 'renderLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Students
Route::get('/students', [StudentController::class, 'renderStudentList'])->name('all_students');
Route::get('/students/new', [StudentController::class, 'renderNewStudentForm'])->name('new_student');
Route::post('/students/new', [StudentController::class, 'createStudent']);
