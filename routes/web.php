<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/register', [\App\Http\Controllers\RegisteredUserController::class, 'index']);
