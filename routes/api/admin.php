<?php

use App\Http\Controllers\Api\V1\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Correct Route facade

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', CategoryController::class);
});
