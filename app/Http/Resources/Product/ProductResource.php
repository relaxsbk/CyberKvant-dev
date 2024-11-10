<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => $this->category->title,
            'title' => $this->title,
            'rating' => $this->rating,
            'price' => $this->money(),
            'reviews' => $this->reviews->count(),
        ];
    }
}
