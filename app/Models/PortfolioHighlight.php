<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioHighlight extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'portfolio_highlights';

    protected $fillable = [
        'porto_project_id',
        'deskripsi',
    ];

    public function portfolioProject(): BelongsTo
    {
        return $this->belongsTo(PortfolioProject::class, 'porto_project_id');
    }
}
