<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'name' => 'required|min:5',
            'body' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Vous devez mettre un title à votre articvle.",
            'name.min' => "Votre article doit faire au moins 5 caractères.",
            'body.required' => "Vous ne pouvez pas créer un article sans contenu.",
            'body.min' => "Le contenu de votre article doit faire au minimum 10 caractères.",
        ];
    }
}
