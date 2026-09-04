<?php

use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\WebProfile\TimController;
use App\Http\Controllers\Api\WebProfile\TestimoniController;
use App\Http\Controllers\Api\WebProfile\ProfileController;
use App\Http\Controllers\Api\WebProfile\LayananController;
use App\Http\Controllers\Api\WebProfile\PaketHargaController;
use App\Http\Controllers\Api\WebProfile\PaketFiturController;
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
Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/layanan/{layanan}', [LayananController::class, 'show']);

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

    Route::post('/layanan', [LayananController::class, 'store']);
    Route::put('/layanan/{layanan}', [LayananController::class, 'update']);
    Route::delete('/layanan/{layanan}', [LayananController::class, 'destroy']);

    Route::post('/layanan/{layanan}/paket-harga', [PaketHargaController::class, 'store']);
    Route::put('/paket-harga/{paketHarga}', [PaketHargaController::class, 'update']);
    Route::delete('/paket-harga/{paketHarga}', [PaketHargaController::class, 'destroy']);

    Route::post('/paket-harga/{paketHarga}/paket-fitur', [PaketFiturController::class, 'store']);
    Route::delete('/paket-fitur/{paketFitur}', [PaketFiturController::class, 'destroy']);
});