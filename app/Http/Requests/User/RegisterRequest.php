<?php

namespace App\Http\Requests\User;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required','date'],
            'phone' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\+7 \(\d{3}\) \d{3}-\d{4}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'dob' => Carbon::parse($this->dob)->format('Y-m-d'),
        ]);
    }
}
