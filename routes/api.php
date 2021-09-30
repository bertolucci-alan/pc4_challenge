<?php

use App\Http\Controllers\Api\SchoolController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', [StudentController::class, 'index'])
    ->name('student.index');

Route::post('/search-students', [StudentController::class, 'search'])
    ->name('student.search');

Route::post('/update-student', [StudentController::class, 'update'])
    ->name('student.update');

Route::post('/register-student', [StudentController::class, 'register'])
    ->name('student.register');

Route::post('/register-school', [SchoolController::class, 'register'])
    ->name('school.register');

Route::get('/schools', [SchoolController::class, 'index'])
    ->name('school.index');