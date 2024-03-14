<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

Route::get('/admin', AdminController::class);
Route::post('/admin/create/event', [AdminController::class,'createEvent'])->name('create.event');

Route::get('/auth', AuthController::class);
Route::post('/auth/login', [AuthController::class,'login'])->name('auth.login');