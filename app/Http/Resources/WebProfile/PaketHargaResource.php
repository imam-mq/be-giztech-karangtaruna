<?php

namespace App\Http\Resources\WebProfile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaketHargaResource extends JsonResource
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
            'layanan_id' => $this->layanan_id,
            'nama_paket' => $this->nama_paket,
            'harga' => $this->harga,
            'tagline' => $this->tagline,
            'is_populer' => $this->is_populer,
            'fitur' => PaketFiturResource::collection($this->whenLoaded('paketFitur')),
        ];
    }
}
