<?php

namespace App\Http\Controllers\Api\WebProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfile\StorePaketHargaRequest;
use App\Http\Requests\WebProfile\UpdatePaketHargaRequest;
use App\Http\Resources\WebProfile\PaketHargaResource;
use App\Models\Layanan;
use App\Models\PaketHarga;
use Illuminate\Http\JsonResponse;

class PaketHargaController extends Controller
{
    /**
     * Tambah paket baru ke layanan tertentu.
     */
    public function store(StorePaketHargaRequest $request, Layanan $layanan): JsonResponse
    {
        $validated = $request->validated();

        
        if (($validated['is_populer'] ?? false) === true) {
            $layanan->paketHarga()->update(['is_populer' => false]);
        }

        $paket = $layanan->paketHarga()->create($validated);
        $paket->load('paketFitur');

        return response()->json([
            'message' => 'Paket berhasil ditambahkan.',
            'data' => new PaketHargaResource($paket),
        ], 201);
    }

    /**
     * Edit paket 
     */
    public function update(UpdatePaketHargaRequest $request, PaketHarga $paketHarga): JsonResponse
    {
        $validated = $request->validated();

        if (($validated['is_populer'] ?? false) === true) {
            $paketHarga->layanan->paketHarga()
                ->where('id', '!=', $paketHarga->id)
                ->update(['is_populer' => false]);
        }

        $paketHarga->update($validated);
        $paketHarga->load('paketFitur');

        return response()->json([
            'message' => 'Paket berhasil diperbarui.',
            'data' => new PaketHargaResource($paketHarga),
        ]);
    }

    public function destroy(PaketHarga $paketHarga): JsonResponse
    {
        $paketHarga->delete();

        return response()->json([
            'message' => 'Paket berhasil dihapus.',
        ]);
    }
}