<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListimgRequest extends FormRequest
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
            'link_img' => 'required|mimes:png,jpg,jpeg,jpe,gif|max:5120'
        ];
    }
    public function messages()
    {
        return [
            'link_img.required' => 'Bạn chưa chọn ảnh upload',
            'link_img.mimes' => 'Ảnh không đúng định dạng',
            'link_img.max' => 'Kích thước ảnh không vượt quá 5MB'
        ];
    }
}
