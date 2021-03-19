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
        if ($this->path() == 'register')
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *　
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'max:10'],
            'last_name' => ['required', 'max:10'],
            'email' => ['required', 'email:strict,dns,spoof', 'unique:users'],
            'password' => ['required', 'min:8', 'max:16'],
            'role_id' => ['required']
        ];
    }

    //エラーメッセージの日本語化
    public function messages() {
        return [
            'first_name.required' => '姓名は必須項目です。',
            'first_name.max:10' => '10文字以内で入力してください。',
            'last_name.required' => '姓名は必須項目です。',
            'last_name.max:10' => '10文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須項目です。',
            'email.email:strict,dns,spoof' => 'メールアドレスの形式が間違っています。',
            'email.unique:users' => 'このメールアドレスは既に存在します。',
            'password.required' => 'パスワードは必須項目です。',
            'password.min:8' => '8文字以上で入力してください。',
            'password.max:16' => '16文字以内で入力してください。',
            'role_id.required' => '権限は必須項目です。'
        ];
    }
}
