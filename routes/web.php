<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PlanController::class, 'index'])->name('dashboard');

    Route::resource('plans', PlanController::class)
        ->except(['index']);

    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
});
Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
