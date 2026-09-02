<?php

namespace App\Http\Controllers\Api\WebProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfile\StoreTimRequest;
use App\Http\Requests\WebProfile\UpdateTimRequest;
use App\Http\Resources\WebProfile\TimResource;
use App\Models\Tim;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class TimController extends Controller
{
    /**
     * public admin
     */
    public function index(): JsonResponse
    {
        $tim = Tim::latest()->get();

        return response()->json([
            'data' => TimResource::collection($tim),
        ]);
    }
    /**
     * public admin
     */
    public function show(Tim $tim): JsonResponse
    {
        return response()->json([
            'data' => new TimResource($tim),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads/tim', 'public');
        }

        $tim = Tim::create($validated);

        return response()->json([
            'message' => 'Anggota tim berhasil ditambahkan.',
            'data' => new TimResource($tim),
        ], 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimRequest $request, Tim $tim): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($tim->photo) {
                Storage::disk('public')->delete($tim->photo);
            }
            $validated['photo'] = $request->file('photo')->store('uploads/tim', 'public');
        }

        $tim->update($validated);

        return response()->json([
            'message' => 'Data tim berhasil diperbarui.',
            'data' => new TimResource($tim),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tim $tim): JsonResponse
    {
        if($tim->photo) {
            Storage::disk('public')->delete($tim->photo);
        }
        $tim->delete();

        return response()->json([
            'message' => 'Anggota tim berhasil dihapus.',
        ]);
    }
}
