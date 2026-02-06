<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/dashboard', [PlanController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/plans/create', [PlanController::class, 'create'])
    ->name('plans.create')
    ->middleware('auth');

Route::get('/plans/{plan}/edit', [PlanController::class, 'edit'])
    ->name('plans.edit')
    ->middleware('auth');

Route::get('/plans/{plan}', [PlanController::class, 'show'])
    ->name('plans.show')
    ->middleware('auth');

Route::put('/plans/{plan}', [PlanController::class, 'update'])
    ->name('plans.update')
    ->middleware('auth');

Route::delete('/plans/{plan}', [PlanController::class, 'destroy'])
    ->name('plans.destroy')
    ->middleware('auth');

Route::post('/plans', [PlanController::class, 'store'])
    ->name('plans.store')
    ->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');
