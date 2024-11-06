<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category_characteristic extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryCharacteristicFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'attribute_characteristic',
    ];

    protected $casts = [
        'attribute_characteristic' => 'string'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
