<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'config' => 'required|integer|min:5|max:100|regex:(^([^/\$\&\<\>\?\"\-\+\=\%\*\`\.\^\]\)]+)$)',
        ];
    }

    public function messages()
    {
        return [
            'config.required' => 'Bạn phải điền đầy đủ',
            'config.integer' => 'Bạn phải điền số',
            'config.min' => 'Số phải từ 5 - 100',
            'config.max' => 'Số phải từ 5 - 100',
            'config.regex' => 'Vui lòng không điền các ký tự đặc biệt',
        ];
    }
}
