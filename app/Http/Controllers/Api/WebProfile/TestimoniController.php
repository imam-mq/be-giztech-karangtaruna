<?php

namespace App\Http\Controllers\Api\WebProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfile\StoreTestimoniRequest;
use App\Http\Requests\WebProfile\UpdateTestimoniRequest;
use App\Http\Resources\WebProfile\TestimoniResource;
use App\Models\Testimoni;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index(): JsonResponse
    {
        $testimoni = Testimoni::latest()->get();

        return response()->json([
            'data' => TestimoniResource::collection($testimoni),
        ]);
    }

    public function show(Testimoni $testimoni): JsonResponse
    {
        return response()->json([
            'data' => new TestimoniResource($testimoni),
        ]);
    }

    public function store(StoreTestimoniRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('uploads/testimoni', 'public');
        }

        $testimoni = Testimoni::create($validated);

        return response()->json([
            'message' => 'Testimoni berhasil ditambahkan.',
            'data' => new TestimoniResource($testimoni),
        ], 201);
    }

    public function update(UpdateTestimoniRequest $request, Testimoni $testimoni): JsonResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            if ($testimoni->avatar) {
                Storage::disk('public')->delete($testimoni->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('uploads/testimoni', 'public');
        }

        $testimoni->update($validated);

        return response()->json([
            'message' => 'Testimoni berhasil diperbarui.',
            'data' => new TestimoniResource($testimoni),
        ]);
    }

    public function destroy(Testimoni $testimoni): JsonResponse
    {
        if ($testimoni->avatar) {
            Storage::disk('public')->delete($testimoni->avatar);
        }

        $testimoni->delete();

        return response()->json([
            'message' => 'Testimoni berhasil dihapus.',
        ]);
    }
}