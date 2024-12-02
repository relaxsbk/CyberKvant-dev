<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Characteristic extends Model
{
    /** @use HasFactory<\Database\Factories\CharacteristicFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'characteristic'
    ];

    protected $casts = [
        'characteristic' => 'array'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function characteristicsIsNull()
    {
        if ($this->characteristics === null) {
            return [];
        }
        return $this->characteristics;
    }
}
