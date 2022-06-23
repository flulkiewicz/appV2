<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PalController;
use App\Http\Controllers\TaskController;


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

Route::resource('pal', PalController::class);
Route::post('/pal/search', [PalController::class, 'search'])->name('pal.search');
Route::resource('task', TaskController::class);
Route::post('/task/search', [TaskController::class, 'search'])->name('task.search');
Route::post('/task/paltasks', [TaskController::class, 'paltasks'])->name('task.paltasks');
