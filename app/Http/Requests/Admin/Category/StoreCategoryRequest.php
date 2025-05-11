<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'catalog_id' => 'required|exists:catalogs,id',
            'published' => 'nullable',
            'image' => 'required|image|max:2048',
        ];
    }
}
