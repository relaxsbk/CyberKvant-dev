<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'image',
        'published',
        'catalog_id'
    ];

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function category_characteristic(): HasOne
    {
        return $this->hasOne(Category_characteristic::class);
    }
}
