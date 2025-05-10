<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Characteristics\CharacteristicResource;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Characteristic;
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
            'catalog' => $this->category->catalog,
            'category' => $this->category,
            'title' => $this->title,
            'rating' => $this->rating,
            'price' => $this->money(),
            'reviewsCount' => $this->reviews->count(),
            'reviews' => ReviewResource::collection($this->reviews),
//            dd($this->characteristic)
            'characteristic' => $this->formatCharacteristics($this->characteristic),
//            'characteristic' => $this->when($this->characteristicsIsNull, $this->formatCharacteristics($this->characteristic->characteristic)),

        ];
    }

    protected function formatCharacteristics(Characteristic|null $characteristics): array|null
    {

        $formatted = [];

        if ($characteristics === null) {
            return null;
        }

        foreach ($characteristics->characteristic as $group => $attributes) {
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
