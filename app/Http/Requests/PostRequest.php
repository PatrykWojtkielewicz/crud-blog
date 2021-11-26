<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post_title' => 'required|min:3|max:255|unique:posts,title',
            'post_content' => 'required|min:3',
            'post_image' => 'image|mimes:jpeg,png,jpg',
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
            'post_title.required' => 'Tytuł posta jest wymagany',
            'post_title.min' => 'Tytuł posta jest za krótki',
            'post_title.max' => 'Tytuł posta jest za długi',
            'post_title.unique' => 'Podany tytuł już istnieje w bazie danych',
            'post_content.required' => 'Treść posta jest wymagana!',
            'post_content.min' => 'Post jest za krótki!',
            'post_image.image' => 'Przesłany plik nie jest zdjęciem',
            'post_image.mimes' => 'Akceptujemy jedynie pliki .jpeg .png .jpg',
        ];
    }
}
