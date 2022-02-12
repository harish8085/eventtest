<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

Route::get(
    '/',
    [EventController::class, 'index']
);
Route::get(
    '/events',
    [EventController::class, 'index']
);

Route::get(
    '/event/create',
    [EventController::class, 'create']
)->name('event/create');

Route::post(
    '/event/store-event',
    [EventController::class, 'store']
)->name('event/store');

Route::get(
    '/event/load-list',
    [EventController::class, 'getEvents']
)->name('event/list');

Route::get(
    '/event/delete-event',
    [EventController::class, 'deleteEvent']
)->name('event/delete');
