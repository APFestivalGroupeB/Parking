<?php

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

Auth::routes();
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('utilisateurs', App\Http\Controllers\UserController::class)->except(['edit']);

    Route::resource('reservations', App\Http\Controllers\ReservationController::class)->except(['edit', 'show', 'update']);
    Route::post('reservations/position/{utilisateur}', [App\Http\Controllers\ReservationController::class, 'changePosition'])->name('reservations.position');
    Route::post('reservations/force', [App\Http\Controllers\ReservationController::class, 'force'])->name('reservations.force');
    Route::get('reservations/browse', [App\Http\Controllers\ReservationController::class, 'browse'])->name('reservations.browse');

    Route::resource('places', App\Http\Controllers\PlaceController::class)->except(['edit']);
});
