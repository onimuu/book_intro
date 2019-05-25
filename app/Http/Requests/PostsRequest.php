<?php

namespace App\Http\Requests;

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
            'title' => 'required',
            'book' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'body' => 'required|max: 400',
        ];
    }

    public function messages()
    {
      return [
        'title.required' => '必須項目です。',
        'book.required' => '必須項目です。',
        'author.required' => '必須項目です。',
        'genre.required' => '必須項目です。',
        'body.required' => '必須項目です。',
        'body.max' => '400字以内で入力して下さい。',
      ];
    }
}
