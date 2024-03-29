<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'index']);
Route::post('/', [TodoController::class, 'index']);

Route::get('/logout', [TodoController::class, 'logout']);

Route::post('/create', [TodoController::class, 'create']);

Route::post('/update', [TodoController::class, 'update']);

Route::get('/complete', [TodoController::class, 'complete']);
Route::post('/complete', [TodoController::class, 'complete']);

Route::get('/list', [TodoController::class, 'pagenate']);

Route::get('/relisted', [TodoController::class, 'relisting']);
Route::post('/relisted', [TodoController::class, 'relisting']);

Route::get('/update_page', [TodoController::class, 'updatepage']);
Route::post('/update_page', [TodoController::class, 'updatepage']);

Route::get('/attendance', function () {
    return view('attendance.attendance');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
