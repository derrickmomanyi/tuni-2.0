<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/users', AuthController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/forgot_password', [ForgotPasswordController::class, 'reset']);
Route::post('/reset-password', [ResetPasswordApiController::class, 'reset'])->name('password.reset');

