<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaketFitur extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'paket_harga_id',
        'fitur_text',
    ];

    public function paketHarga(): BelongsTo
    {
        return $this->belongsTo(PaketHarga::class);
    }
}
