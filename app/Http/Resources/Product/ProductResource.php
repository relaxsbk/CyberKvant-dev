<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Characteristics\CharacteristicResource;
use App\Http\Resources\Review\ReviewResource;
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
            'reviewsCount' => $this->reviews->count(),
            'reviews' => ReviewResource::collection($this->reviews),
            'characteristic' => $this->formatCharacteristics($this->characteristic->characteristic),
        ];
    }

    protected function formatCharacteristics(array $characteristics): array
    {
        $formatted = [];

        foreach ($characteristics as $group => $attributes) {
            $formatted[] = [
                'group' => $group, // Например: "Дисплей", "Операционная система"
                'attributes' => collect($attributes)->map(function ($value, $key) {
                    return [
                        'name' => $key,    // Например: "Экран", "Разрешение экрана"
                        'value' => $value, // Например: "6.8"", "3120х1440"
                    ];
                })->values()->all(),
            ];
        }

        return $formatted;


    }

}
