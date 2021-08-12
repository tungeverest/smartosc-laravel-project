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
            'name' => 'required|min:3|max:30|regex:(^([^/\$\<\#;\>\?\"\+\=\%\*\`\-\.\^\]\)]+)$)',
            'password' => 'required|min:6|max:30|regex:(^([^/\<;\>\"\$\+\=\^\]\)]+)$)',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng điền Username',
            'name.min' => 'Username phải có từ 3-30 ký tự',
            'name.max' => 'Username phải có từ 3-30 ký tự',
            'name.regex' => 'Tên không chứa ký tự đặc biệt',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password phải có từ 6-30 ký tự',
            'password.max' => 'Password phải có từ 6-30 ký tự',
            'password.regex' => 'Các ký tự password được phép % & # @ ? * .'
        ];
    }
}
