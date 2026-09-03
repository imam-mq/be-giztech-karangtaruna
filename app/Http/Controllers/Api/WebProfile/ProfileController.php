<?php

namespace App\Http\Controllers\Api\WebProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebProfile\StoreProfileRequest;
use App\Http\Requests\WebProfile\UpdateProfileRequest;
use App\Http\Resources\WebProfile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $profile = Profile::orderBy('tahun')->get();

        return response()->json([
            'data' => ProfileResource::collection($profile),
        ]);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request): JsonResponse
    {
        $profile = Profile::create($request->validated());

        return response()->json([
            'message' => 'Data perjalanan berhasil ditambahkan.',
            'data' => new ProfileResource($profile),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile): JsonResponse
    {
        return response()->json([
            'data' => new ProfileResource($profile),
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile): JsonResponse
    {
        $profile->update($request->validated());

        return response()->json([
            'message' => 'Data perjalanan berhasil diperbarui.',
            'data' => new ProfileResource($profile),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile): JsonResponse
    {
        $profile->delete();

        return response()->json([
            'message' => 'Data perjalanan berhasil dihapus.',
        ]);
    }
}
