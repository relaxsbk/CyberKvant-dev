<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Characteristic extends Model
{
    /** @use HasFactory<\Database\Factories\CharacteristicFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'characteristics'
    ];

    protected $casts = [
        'characteristic' => 'array'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
