<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::get('/', [EventController::class, 'index'])->name('eventsAll');
Route::get('/addEvent', [EventController::class, 'create'])->name('addEvent');
Route::post('/saveEvent', [EventController::class, 'store'])->name('saveEvent');
Route::get('/editEvent/{id}', [EventController::class, 'edit'])->name('editEvent');
Route::post('/updateEvent', [EventController::class, 'store'])->name('updateEvent');
Route::get('/viewEvent/{id}', [EventController::class, 'show'])->name('viewEvent');
Route::get('/deleteEvent/{id}', [EventController::class, 'destroy'])->name('deleteEvent');
