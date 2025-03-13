<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'email' => 'required|email|',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required|same:password',
            'name' => 'required|string|min:8',
            'alamat' => 'required|string|max:255',
            'no_handphone' => 'required|integer|min:12'
        ];
    }
}
