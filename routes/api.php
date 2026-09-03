<?php

use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\WebProfile\TimController;
use App\Http\Controllers\Api\WebProfile\TestimoniController;
use App\Http\Controllers\Api\WebProfile\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Public routes (halaman publik)
Route::get('/tim', [TimController::class, 'index']);
Route::get('/tim/{tim}', [TimController::class, 'show']);
Route::get('/testimoni', [TestimoniController::class, 'index']);
Route::get('/testimoni/{testimoni}', [TestimoniController::class, 'show']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/profile/{profile}', [ProfileController::class, 'show']);

// Protected routes - (admin)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

    Route::post('/tim', [TimController::class, 'store']);
    Route::put('/tim/{tim}', [TimController::class, 'update']);
    Route::delete('/tim/{tim}', [TimController::class, 'destroy']);

    Route::post('/testimoni', [TestimoniController::class, 'store']);
    Route::put('/testimoni/{testimoni}', [TestimoniController::class, 'update']);
    Route::delete('/testimoni/{testimoni}', [TestimoniController::class, 'destroy']);

    Route::post('/profile', [ProfileController::class, 'store']);
    Route::put('/profile/{profile}', [ProfileController::class, 'update']);
    Route::delete('/profile/{profile}', [ProfileController::class, 'destroy']);
});