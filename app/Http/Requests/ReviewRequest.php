<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'rating' => ['required', 'numeric', 'min:1'],
            'text' => ['required']
        ];
    }
}
