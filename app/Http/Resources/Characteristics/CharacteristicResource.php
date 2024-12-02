<?php

namespace App\Http\Resources\Characteristics;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacteristicResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'characteristics' => $this->formatCharacteristics($this->characteristic)
        ];
    }

    protected function formatCharacteristics(array $characteristics): array|null
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
