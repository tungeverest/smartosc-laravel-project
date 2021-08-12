<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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

            'banner_name' => 'required|mimes:png,jpg,jpeg,jpe,gif|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'banner_name.required' => 'Vui lòng upload ảnh banner cho sản phẩm',
            'banner_name.mimes' => 'Ảnh Banner chưa đúng định dạng',
            'banner_name.max' => 'Ảnh Banner không vượt quá 5mb',


        ];
    }
}
