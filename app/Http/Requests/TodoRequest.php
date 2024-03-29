<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => 'required|max: 30'
        ];
    }

    public function messages() {
        return [
            'content.required' => '30文字以内で記入してください',
            'content.max' => '30文字以内で記入してください'
        ];
    }
}
