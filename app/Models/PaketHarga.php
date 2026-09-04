<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketHarga extends Model
{
    use HasFactory;

    protected $table = 'paket_harga';

    protected $fillable  = [
        'layanan_id',
        'nama_paket',
        'harga',
        'tagline',
        'is_populer'
    ];

    protected $cats = [
        'is_populer' => 'boolean',
    ];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function paketFitur(): HasMany
    {
        return $this->hasMany(PaketFitur::class);
    }
}
