<?php

namespace App\Http\Resources\WebProfile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LayananResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_layanan' => $this->nama_layanan,
            'slug' => $this->slug,
            'deskripsi_singkat' => $this->deskripsi_singkat,
            'harga_mulai_dari' => $this->harga_mulai_dari,
            'paket_harga' => PaketHargaResource::collection($this->whenLoaded('paketHarga')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
