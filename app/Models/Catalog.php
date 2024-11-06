<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalog extends Model
{
    /** @use HasFactory<\Database\Factories\CatalogFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'image',
        'published',
    ];

    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
