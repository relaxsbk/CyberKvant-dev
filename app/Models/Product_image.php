<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product_image extends Model
{
    /** @use HasFactory<\Database\Factories\Product_imageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'url',
        'position'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
