<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PortfolioProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'year',
        'deskripsi',
        'thumbnail',
    ];

    public function techStack(): HasMany
    {
        return $this->hasMany(PortfolioTechStack::class, 'porto_project_id');
    }

    public function highlights(): HasMany
    {
        return $this->hasMany(PortfolioHighlight::class, 'porto_project_id');
    }
}