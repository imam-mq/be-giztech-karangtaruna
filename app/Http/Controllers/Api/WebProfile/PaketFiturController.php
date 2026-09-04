<?php

namespace App\Http\Controllers\Api\WebProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfile\StorePaketFiturRequest;
use App\Http\Resources\WebProfile\PaketFiturResource;
use App\Models\PaketFitur;
use App\Models\PaketHarga;
use Illuminate\Http\JsonResponse;

class PaketFiturController extends Controller
{
    public function store(StorePaketFiturRequest $request, PaketHarga $paketHarga): JsonResponse
    {
        $fitur = $paketHarga->paketFitur()->create($request->validated());

        return response()->json([
            'message' => 'Fitur berhasil ditambahkan.',
            'data' => new PaketFiturResource($fitur),
        ], 201);
    }

    public function destroy(PaketFitur $paketFitur): JsonResponse
    {
        $paketFitur->delete();

        return response()->json([
            'message' => 'Fitur berhasil dihapus.',
        ]);
    }
}