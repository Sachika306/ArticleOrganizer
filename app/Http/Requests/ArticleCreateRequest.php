<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'article/store')
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
            'title' => ['required', 'max:200'],
            'outline_user_id' => ['required'],
            'outline_deadline' => ['required', 'date_format:Y-m-d'],
            'article_deadline' => ['required', 'date_format:Y-m-d'],
            'article_user_id' => ['required'],
            'outline_user_name' => ['required'],
            'article_user_name' => ['required']
        ];
    }
}
