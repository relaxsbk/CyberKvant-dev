<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_status_id',
        'total',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus():BelongsTo
    {
        return $this->belongsTo(Order_status::class);
    }

    public function items():HasMany
    {
        return $this->hasMany(Detail_order::class);
    }
}
