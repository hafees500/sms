<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
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
    return view('welcome');
});

// Application Routes
Route::get('students', [StudentsController::class,'index']);
Route::get('students/add-student', [StudentsController::class,'addStudent']);
Route::post('students/store', [StudentsController::class,'store']);
Route::get('students/update-student/{id}', [StudentsController::class,'UpdateStudent']);
Route::PUT('students/update/{id}', [StudentsController::class,'update']);
Route::DELETE('students/delete/{id}', [StudentsController::class,'delete']);
