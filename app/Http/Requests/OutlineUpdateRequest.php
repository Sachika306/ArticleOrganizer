<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutlineUpdateRequest extends FormRequest
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
            'lead_chars' => ['required'],
            'part1_chars' => ['required'],
            'part2_chars' => ['required'],
            'part3_chars' => ['required'],
            // 'part4_chars' => ['required'],
            // 'part5_chars' => ['required'],
            // 'part6_chars' => ['required'],
        ];
    }
}
