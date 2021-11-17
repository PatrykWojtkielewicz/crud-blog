<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'user_name' => 'required|min:3|unique:users,name',
            'user_email' => 'required|email|unique:users,email',
            'user_password' => 'required|min:6',
        ];
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_name.required' => 'Nazwa użytkownika jest wymagana',
            'user_name.min' => 'Nazwa użytkownika musi zawierać przynajmniej 3 znaki',
            'user_name.unique' => 'Podana nazwa użytkownika jest już zajęta',
            'user_email.required' => 'Adres e-mail jest wymagany',
            'user_email.email' => 'Podana wartość nie jest adresem e-mail',
            'user_email.unique' => 'Podany adres e-mail jest już zajęty',
            'user_password.required' => 'Hasło jest wymagane',
            'user_password.min' => 'Podane hasło jest za krótkie',
        ];
    }
}
