<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

//Route::view('/dashboard', 'dashboard');

Route::get('/dashboard', [PlanController::class, 'index'])->name('dashboard');

Route::get('/plans/{plan}', [PlanController::class, 'show'])->name('plans.show');

Route::get('/register', [RegisteredUserController::class, 'index']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'store']);


