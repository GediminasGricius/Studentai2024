<?php

use App\Http\Controllers\StudentControllerAPI;
use App\Models\Student;
use http\Client\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', [StudentControllerAPI::class, 'students']);
Route::get('/students/{id}', [StudentControllerAPI::class, 'student']);

Route::post('/students', [StudentControllerAPI::class, 'store']);

Route::put('/students/{id}', [StudentControllerAPI::class, 'update']);

Route::delete('/students/{id}', [StudentControllerAPI::class, 'destroy']);


/*
Route::get('/students', [StudentControllerAPI::class, 'students']);

Route::post('/students', [StudentControllerAPI::class, 'addStudent']);

Route::put('/students/{id}', function(Request $request, $id){
    $student=Student::find($id);
    $student->name=$request->name;
    $student->surname=$request->surname;
    $student->save();
    return $student;
});
*/
