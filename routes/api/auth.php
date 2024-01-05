<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/registration', [AuthController::class, 'registration'])
    ->name('api.auth.registration');

Route::post('/login', [AuthController::class, 'login'])
    ->name('api.auth.login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware(['auth:api'])
    ->name('api.auth.logout');

Route::get('/login', function() {
        return response()->json(['message' => 'Welcome to login page.'], 200);
    })->name('login');
