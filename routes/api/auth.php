<?php

use App\Actions\Auth\LoginUser;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', LoginUser::class)->name('login');
Route::post('logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')
    ->name('logout');
