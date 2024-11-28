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
            'characteristics' => $this->characteristic
        ];
    }
}
