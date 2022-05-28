<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        if($this->method() == 'POST')
        {
            return [
                'title' => 'required|min:5|max:255',
                'description' => 'required|min:10|max:355',
                'body' => 'required|min:10',
                'images' => 'required|mimes:jpeg,png,gif,webp,bmp',
                'tags' => 'required',
                'categories' => 'required',
            ];
        }

        return [
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:10|max:355',
            'body' => 'required|min:10',
            'tags' => 'required',
            'categories' => 'required',

        ];

    }
}
