<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/dashboard', [PlanController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
Route::get('/plans/{plan}', [PlanController::class, 'show'])
    ->name('plans.show')
    ->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
