<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'required|min:3|max:100|regex:(^([^/\<\#;\>\?\"\=\`\.\^\]\)]+)$)',
            'price' => 'required|numeric|min:0|digits_between:1,10',
            'sale' => 'nullable|numeric|min:0|digits_between:1,10',
            'description' => 'max:500',
            'xuat_xu' => 'required|min:2|max:100',
            'bao_hanh' =>  'required|min:2|max:100',
            'tinh_trang' => 'required|min:2|max:100',
            'trang_thai' => 'required|integer|min:0|max:1',
            'brand_id' => 'required|exists:brand,id|',
            'pro_img' => 'mimes:png,jpg,jpeg,jpe,gif|max:5120|unique:product,pro_img',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng điền tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có từ 3-100 ký tự',
            'name.max' => 'Tên sản phẩm phải có từ 3-100 ký tự',
            'name.regex' => 'Vui lòng đặt tên không chứa ký tự đặc biệt',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm phải là số dương',
            'price.digits_between' => 'Giá sản phẩm chỉ từ 1-10 chữ số',
            'sale.nullable' => 'Giá khuyến mại phải là số',
            'sale.numeric' => 'Giá khuyến mại phải là số',
            'sale.min' => 'Giá khuyến mại phải là số dương',
            'sale.digits_between' => 'Giá khuyến mại chỉ từ 1-10 chữ số',
            'description.max' => 'Mô tả vượt quá 500 ký tự',
            'xuat_xu.required' => 'Vui lòng nhập xuất xứ',
            'xuat_xu.min' => 'Xuất xứ phải có từ 2-100 ký tự',
            'xuat_xu.max' => 'Xuất xứ phải có từ 2-100 ký tự',
            'bao_hanh.required' => 'Vui lòng nhập bảo hành',
            'bao_hanh.min' => 'Bảo hành phải có từ 2-100 ký tự',
            'bao_hanh.max' => 'Bảo hành phải có từ 2-100 ký tự',
            'tinh_trang.required' => 'Vui lòng nhập tình trạng',
            'tinh_trang.min' => 'Tình trạng phải có từ 2-100 ký tự',
            'tinh_trang.max' => 'Tình trạng phải có từ 2-100 ký tự',
            'trang_thai.required' => 'Vui lòng chọn trạng thái',
            'trang_thai.integer' => 'Trạng thái phải là số 1 hoặc 0',
            'trang_thai.min' => 'Trạng thái phải là số 1 hoặc 0',
            'trang_thai.max' => 'Trạng thái phải là số 1 hoặc 0',
            'brand_id.required' => 'Vui lòng chọn thương hiệu',
            'brand_id.exists' => 'Thương hiệu không tồn tại',
            'pro_img.mimes' => 'Ảnh chưa đúng định dạng',
            'pro_img.max' => 'Ảnh không vượt quá 5mb',
            'pro_img.unique' => 'Ảnh đã tồn tại'
        ];
    }
}
