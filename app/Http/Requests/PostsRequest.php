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
            'book' => 'required',
            'title' => 'required',
            'body' => 'required|max: 400',
        ];
    }

    public function messages()
    {
      return [
        'book.required' => '必須項目です。',
        'title.required' => '必須項目です。',
        'body.required' => '必須項目です。',
        'body.max' => '400字以内で入力して下さい。',
      ];
    }
}
