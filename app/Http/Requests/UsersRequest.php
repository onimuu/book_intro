<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'email',
            'photo' => 'file|image|mimes:jpeg,png,jpg|max:5000'
        ];
    }

    public function messages()
    {
      return [
        'name.required' => '必須項目です。',
        'email.email' => 'メールアドレスが必要です。',
        'photo.file' => 'ファイル形式が必要です。',
        'photo.image' => '画像ファイルが必要です。',
        'photo.mimes' => '拡張子がjpeg,png,jpgである必要があります。',
        'photo.max' => 'ファイルの容量オーバーです。',
      ];
    }
}
