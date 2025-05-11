<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'provider_id',
        'title',
        'slug',
        'model',
        'description',
        'price',
        'discount',
        'rating',
        'quantity',
        'published'

    ];
    public function money(): string
    {
        return number_format($this->price, 0, '', ' ');
    }
    public function mainImage()
    {
        return $this->images()->first();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Product_image::class);
    }

    public function characteristic(): HasOne
    {
        return $this->hasOne(Characteristic::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
