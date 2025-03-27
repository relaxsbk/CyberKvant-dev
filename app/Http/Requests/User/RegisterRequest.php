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
            'dob' => ['required','date', 'before_or_equal:today'],
            'phone' => ['required', 'string', 'max:20', 'unique:users',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    //'regex:/^\+7 \(\d{3}\) \d{3}-\d{4}$/'
    protected function prepareForValidation(): void
    {
        $this->merge([
            'dob' => Carbon::parse($this->dob)->format('Y-m-d'),
        ]);
    }
}
