<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\MarksController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentsController::class,'index']);
// Application Routes

# Student Routers
Route::get('students', [StudentsController::class,'index']);
Route::get('students/add-student', [StudentsController::class,'addStudent']);
Route::post('students/store', [StudentsController::class,'store']);
Route::get('students/update-student/{id}', [StudentsController::class,'updateStudent']);
Route::PUT('students/update/{id}', [StudentsController::class,'update']);
Route::DELETE('students/delete/{id}', [StudentsController::class,'delete']);

# Marks Routers


Route::get('marks', [MarksController::class,'index']);
Route::get('marks/add-marks', [MarksController::class,'addMarks']);
Route::post('marks/store', [MarksController::class,'store']);
Route::get('marks/update-mark/{id}', [MarksController::class,'updateMark']);
Route::PUT('marks/update/{id}', [MarksController::class,'update']);
Route::DELETE('marks/delete/{id}', [MarksController::class,'delete']);