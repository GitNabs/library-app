<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'     => ['required', 'email:filter', 'exists:users,email'],
            'password'  => ['required', 'min:8']
        ];
    }

    // creates custom error message
    public function messages()
    {
        return [
            // field.rule  -> custom message
            'email.exists' => 'The account you`re trying to access doesn`t exist.'
        ];
    }
}
