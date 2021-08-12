<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:2|max:100|regex:(^([^/\$\<\#;\>\?\"\-\+\=\%\*\`\.\^\]\)]+)$)|unique:category,name,'.$this->id,
            'parent_id' => 'required|integer|min:0|regex:(^([^/\$\<\#;\>\?\"\+\=\%\*\`\.\^\]\)]+)$)'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng điền Tên',
            'name.min' => 'Tên phải có từ 2-100 ký tự',
            'name.max' => 'Tên phải có từ 2-100 ký tự',
            'name.regex' => 'Vui lòng đặt tên không chứa ký tự đặc biệt',
            'name.unique' => 'Tên đã tồn tại',
            'parent_id.required' => 'Vui lòng chọn Parent Menu',
            'parent_id.integer' => 'Parent Id phải là số',
            'parent_id.min' => 'Parent Id phải là số dương',
            'parent_id.regex' => 'Vui lòng không điền các ký tự đặc biệt',
        ];
    }
}
