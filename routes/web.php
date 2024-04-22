<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LecturerController;
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


Route::resource('lecturers', LecturerController::class)->only([
    'index'
]);
Route::middleware(['auth'])->group(function () {
    Route::resource('lecturers', LecturerController::class)->except(['index']);


    Route::resource('courses', CourseController::class);
    Route::get('/student/create', [StudentController::class,'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{id}/edit',[StudentController::class,'edit'])->name('student.edit')->middleware('adult');
    Route::post('/student/{id}/save',[StudentController::class,'save'])->name('student.save');

    Route::get('/student/{id}/delete', [StudentController::class, 'delete'])->name('student.delete');
    Route::get('/student/{id}/document',[StudentController::class, 'document'])->name('student.document');
    Route::get('/student/{id}/documentDelete',[StudentController::class, 'documentDelete'])->name('student.documentDelete');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('setlanguage/{lang}', [\App\Http\Controllers\LanguageController::class,'setLanguage'])->name('setLanguage');

Route::get('/students', [StudentController::class,'index'])->name('student.index');



