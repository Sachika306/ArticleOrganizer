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
            // バリデーションの登録
            'first_name' => ['required', 'max:10'],
            'last_name' => ['required', 'max:10'],
            'email' => ['required', 'email:strict,dns,spoof', 'unique:users'],
            'password' => ['required', 'min:8', 'max:16'],
            'role_id' => ['required']
        ];
    }
}
