<?php

use App\Http\Controllers\Web\PagesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [PagesController::class, 'home'])
    ->name('home');

Route::get('/alunos', [PagesController::class, 'students'])
    ->name('students');

Route::get('/turmas', [PagesController::class, 'classes'])
    ->name('classes');

Route::get('/escolas', [PagesController::class, 'schools'])
    ->name('schools');