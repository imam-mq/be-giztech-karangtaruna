<?php

namespace App\Http\Controllers\Api\WebProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfile\StoreLayananRequest;
use App\Http\Requests\WebProfile\UpdateLayananRequest;
use App\Http\Resources\WebProfile\LayananResource;
use App\Models\Layanan;
use Illuminate\Http\JsonResponse;

class LayananController extends Controller
{
    public function index(): JsonResponse
    {
        $layanan = Layanan::with('paketHarga.paketFitur')->latest()->get();

        return response()->json([
            'data' => LayananResource::collection($layanan),
        ]);
    }

    public function show(Layanan $layanan): JsonResponse
    {
        $layanan->load('paketHarga.paketFitur');

        return response()->json([
            'data' => new LayananResource($layanan),
        ]);
    }

    public function store(StoreLayananRequest $request): JsonResponse
    {
        $layanan = Layanan::create($request->validated());

        return response()->json([
            'message' => 'Layanan berhasil ditambahkan.',
            'data' => new LayananResource($layanan),
        ], 201);
    }

    public function update(UpdateLayananRequest $request, Layanan $layanan): JsonResponse
    {
        $layanan->update($request->validated());

        return response()->json([
            'message' => 'Layanan berhasil diperbarui.',
            'data' => new LayananResource($layanan),
        ]);
    }

    public function destroy(Layanan $layanan): JsonResponse
    {
        $layanan->delete();

        return response()->json([
            'message' => 'Layanan beserta paket harganya berhasil dihapus.',
        ]);
    }
}