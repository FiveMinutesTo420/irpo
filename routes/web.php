<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\Coordinator;

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
    $events = Event::all();
    $coords = Coordinator::orderBy('id','DESC')->get();

    return view('welcome',compact('events','coords'));
});
Route::get('/event/{slug}', EventController::class);
Route::get('/forum', function () {
    return view('forum');
});
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/admin', AdminController::class)->name('admin');
    Route::get('/logout', [AdminController::class,'logout'])->name('logout');
    
    Route::post('/admin/create/event', [AdminController::class,'createEvent'])->name('create.event');
    
    Route::post('/admin/create/coordinator', [AdminController::class,'createCoordinator'])->name('create.coordinator');
    Route::post('/admin/delete/coordinator/{coord}', [AdminController::class,'deleteCoordinator'])->name('delete.coordinator');
    Route::get('/admin/edit/coordinator/{coord}', [AdminController::class,'editCoordinator'])->name('edit.coordinator');
    Route::post('/admin/edit/coordinator/{coord}', [AdminController::class,'storeEditCoordinator'])->name('edit.coordinator.store');

    
    Route::post('/admin/delete/event', [AdminController::class,'deleteEvent'])->name('delete.event');

    Route::get('/admin/edit/{event}', [AdminController::class,'editEvent'])->name('edit.event');
    Route::post('/admin/edit/store/{event}', [AdminController::class,'storeEditEvent'])->name('edit.event.store');


});


Route::get('/auth', AuthController::class)->name('auth');
Route::get('/event/{slug}', EventController::class)->name('event');

Route::post('/auth/login', [AuthController::class,'login'])->name('auth.login');