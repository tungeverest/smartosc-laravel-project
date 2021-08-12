<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandAddRequest extends FormRequest
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
            'name' => 'required|min:2|max:30|regex:(^([^/\$\<\#;\>\?\"\-\+\=\%\*\`\.\^\]\)]+)$)',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng điền tên Brand',
            'name.min' => 'Username phải có từ 2-30 ký tự',
            'name.max' => 'Username phải có từ 2-30 ký tự',
            'name.regex' => 'Vui lòng đặt tên không chứa ký tự đặc biệt',

        ];
    }
}
