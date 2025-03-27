<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id),],
            'dob' => ['required','date'],
//            'phone' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\+7 \(\d{3}\) \d{3}-\d{4}$/'],
        ];
    }
}
