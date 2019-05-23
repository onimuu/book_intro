<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
          'email' => 'required|string',
          'password' => 'required|string',
        ];
    }

    public function messages()
    {
      return [
        'email.required' =>  '必須項目です。',
        'email.string' =>  '文字の入力が必要です。',
        'password.required' =>  '必須項目です。',
        'password.string' =>  '文字の入力が必要です。',
      ];
    }
}
