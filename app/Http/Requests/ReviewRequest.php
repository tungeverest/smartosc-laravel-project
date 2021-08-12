<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            "name" => 'max:50|required|regex:(^([^/\$\<\#;\>\?\"\+\=\%\*\`\.\^\]\)]+)$)',
            "email" => "required|email",
            "phone" => "nullable|numeric|regex:/^[0-9]{10,12}$/",
            "comment" => "nullable|max:200",
        ];
    }

    public function messages()
    {
        return [
            "name.max" => "Số kí tự giới hạn 50",
            "name.required" => "Bạn phải điền tên vào",
            "name.regex" => "Tên không chứa ký tự đặc biệt",
            "email.required" => "Bạn phải điền email vào",
            "email.email" => "Bạn phải điền email vào",
            "phone.numeric" => "Bạn phải điền số vào",
            "phone.regex" => "Bạn phải điền số vào",
            "comment.max" => "Bạn chỉ nên comment dưới 200 từ",
        ];
    }
}
