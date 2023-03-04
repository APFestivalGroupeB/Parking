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

    Route::resource('utilisateurs', App\Http\Controllers\UserController::class);

    Route::resource('reservation', App\Http\Controllers\ReservationController::class)
        ->except(['create']);

    Route::resource('place', App\Http\Controllers\PlaceController::class);
});
