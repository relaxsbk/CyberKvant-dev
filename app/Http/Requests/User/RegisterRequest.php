<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required','date_format:Y-m-d\TH:i:s.v\Z'],
            'phone' => ['required', 'string', 'max:255'], // TODO:regex когда внедрю маску в форму
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
