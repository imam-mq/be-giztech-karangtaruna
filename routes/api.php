<?php

use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\WebProfile\TimController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Public routes (halaman publik)
Route::get('/tim', [TimController::class, 'index']);
Route::get('/tim/{tim}', [TimController::class, 'show']);

// Protected routes - (admin)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

    Route::post('/tim', [TimController::class, 'store']);
    Route::put('/tim/{tim}', [TimController::class, 'update']);
    Route::delete('/tim/{tim}', [TimController::class, 'destroy']);
});