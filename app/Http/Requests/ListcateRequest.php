<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListcateRequest extends FormRequest
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
            'cate_id' => 'required|integer|min:1|regex:(^([^/\$\&\<\>\?\"\+\=\%\*\`\.\^\]\)]+)$)|exists:category,id'
        ];
    }

    public function messages()
    {
        return [
            'cate_id.required' => 'Vui lòng chọn Category',
            'cate_id.integer' => 'Category Id phải là số',
            'cate_id.min' => 'Category Id phải là số dương lớn hơn 0',
            'cate_id.regex' => 'Vui lòng không điền các ký tự đặc biệt',
            'cate_id.exists' => 'Category không tồn tại'
        ];
    }
}
