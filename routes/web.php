<?php

use App\Http\Controllers\StudentController;
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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student/create', [StudentController::class,'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');

Route::get('/students', [StudentController::class,'index'])->name('student.index');

Route::get('/student/{id}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::post('/student/{id}/save',[StudentController::class,'save'])->name('student.save');

Route::get('/student/{id}/delete', [StudentController::class, 'delete'])->name('student.delete');
