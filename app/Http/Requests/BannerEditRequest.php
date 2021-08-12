<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerEditRequest extends FormRequest
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
            'banner_id' => 'required|exists:banner,id',
            'slide_position' => 'required|integer|min:0|max:8',
        ];
    }

    public function messages()
    {
        return [
            'banner_id.required' => 'Lỗi id banner',
            'banner_id.mimes' => 'Banner không tồn tại',
            'slide_position.required' => 'Vị trí banner chưa được chọn',
            'slide_position.integer' => 'Vị trí banner phải là số dương từ 0-8',
            'slide_position.min' => 'Vị trí banner phải là số dương từ 0-8',
            'slide_position.max' => 'Vị trí banner phải là số dương từ 0-8',

        ];
    }
}
