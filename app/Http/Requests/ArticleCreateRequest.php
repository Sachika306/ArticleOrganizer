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
            'title' => ['required', 'max:40'],
            'outline_user_id' => ['required',  'integer'],
            'outline_url' => ['url'],
            'outline_deadline' => ['required', 'date_format:Y-m-d'],
            'article_user_id' => ['required', 'integer'],
            'article_url' => ['url'],
            'article_deadline' => ['required', 'date_format:Y-m-d']
        ];
    }

    //エラーメッセージの日本語化
    public function messages() {
        return [
            'title.required' => 'タイトルは必須項目です。',
            'title.max' => '40文字以内で入力してください。',
            'outline_user_id.required' => '担当者は必須項目です。',
            'outline_url.url' => 'URL形式で入力してください。',
            'outline_deadline.required' => '納期は必須項目です。',
            'outline_deadline.date_format' => '納期は「YYYY-MM-DD」の形式で入力してください。',
            'article_user_id.required' => '担当者は必須項目です。',
            'article_url.url' => 'URL形式で入力してください。',
            'article_deadline.required' => '納期は必須項目です。',
            'article_deadline.date_format' => '納期は「YYYY-MM-DD」の形式で入力してください。'
        ];
    }
}
