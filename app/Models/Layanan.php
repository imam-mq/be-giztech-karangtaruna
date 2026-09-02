<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'slug',
        'deskripsi_singkat',
        'harga_mulai_dari',
    ];

    public function paketHarga(): HasMany
    {
        return $this->hasMany(PaketHarga::class);
    }
}
