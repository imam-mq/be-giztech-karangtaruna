<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'slug',
        'deskripsi_singkat',
        'harga_mulai_dari',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function paketHarga(): HasMany
    {
        return $this->hasMany(PaketHarga::class);
    }
}
