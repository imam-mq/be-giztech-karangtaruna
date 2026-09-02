<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioTechStack extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'portfolio_tech_stack';

    protected $fillable = [
        'porto_project_id',
        'tech_name',
    ];

    public function portfolioProject(): BelongsTo
    {
        return $this->belongsTo(PortfolioProject::class, 'porto_project_id');
    }
}