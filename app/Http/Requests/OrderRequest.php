<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            "email" => "required|email|max:100",
            "address" => "required|max:200",
            "phone" => "nullable|numeric|regex:/^[0-9]{10,12}$/",
            "notes" => "nullable|max:300",
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
            "email.max" => "Email giới hạn 100 ký tự",
            "address.required" => "Bạn phải điền địa chỉ vào",
            "address.max" => "Địa chỉ giới hạn 200 ký tự",
            "phone.numeric" => "Bạn phải điền số vào",
            "phone.regex" => "Bạn phải điền số vào",
            "notes.max" => "Bạn chỉ nên comment dưới 300 từ",
        ];
    }
}
