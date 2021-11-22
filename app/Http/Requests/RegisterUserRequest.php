<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nazwa użytkownika jest wymagana',
            'name.string' => 'Nazwa użytkownika nie jest ciągiem znaków',
            'name.max' => 'Nazwa użytkownika jest za długa',
            'name.min' => 'Nazwa użytkownika jest za krótka',
            'email.required' => 'E-mail jest wymagany',
            'email.string' => 'E-mail nie jest ciągiem znaków',
            'email.email' => 'Podana wartość nie jest adresem e-mail',
            'email.max' => 'Email jest za długi',
            'email.unique' => 'Email jest już używany',
            'password.required' => 'Hasło jest wymagane',
            'password.confirmed' => 'Podane hasła nie zgadzają się',
        ];
    }
}
