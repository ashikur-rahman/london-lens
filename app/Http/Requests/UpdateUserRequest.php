<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */


    public function rules(): array
    {
        return [

            'name' => ['required','string','max:255'],

            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('user')),
            ],

            'phone' => ['nullable','max:30'],

            'password' => [
                'nullable',
                'confirmed',
                Password::defaults(),
            ],

            'role' => ['required'],

            'status' => ['required','boolean'],

        ];
    }


}
