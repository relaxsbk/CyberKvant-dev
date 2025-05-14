<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MiniProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'category' => $this->category,
            'title' => $this->title,
            'rating' => $this->rating,
            'price' => $this->money(),
            'reviewsCount' => $this->reviews->count(),
            'mainImage' => $this->mainImage()->url,
        ];
    }
}
