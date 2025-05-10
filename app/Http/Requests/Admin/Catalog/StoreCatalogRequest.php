<?php

namespace App\Http\Requests\Admin\Catalog;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatalogRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'nullable', 'string'],
            'image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'published' => ['nullable'],
        ];
    }
}
