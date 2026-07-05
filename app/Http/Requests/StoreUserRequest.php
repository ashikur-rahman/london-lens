<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],

            'phone' => [
                'nullable',
                'max:30'
            ],

                    'password' => [
                'required',
                'confirmed',
                \Illuminate\Validation\Rules\Password::defaults(),
            ],

            'role' => [
                'required'
            ],

            'status' => [
                'required',
                'boolean'
            ]

        ];
    }
}
