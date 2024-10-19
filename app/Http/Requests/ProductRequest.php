<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
          'img' => 'mimes:jpg,jpeg,png,gif|max:10048|',
          'name' => 'required|unique:product|regex:/(^[\pL0-9 ]+$)/u',
           'publisher'=>'required|regex:/(^[\pL0-9 ]+$)/u',
           'unit_price'=>'required',
            
        
            'img' => 'required|mimes:jpg,jpeg,png,gif|max:10048',
            'description'=>'required'   

        ];
    }
    public function messages()
    {
        return [
            'name.regex' => 'Tên sách không được phép có ký tự đặc biệt',
            'name.required' => 'Vui lòng nhập tên sách',
            'name.unique' => 'Tên sách đã được sử dụng',
 
            'publisher.required'=>'Vui lòng nhập nhà sản xuất',
            'publisher.regex'=>'Tên tác giả không được phép có ký tự đặc biệt',
            'unit_price.required'=>'Vui lòng nhập giá sản phẩm',       
           
           'img.required'=>'Vui lòng chọn ảnh',
            'img.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
           'img.max' => 'Hình thẻ giới hạn dung lượng không quá 10M',
           
            'description.required'=>'Vui lòng nhập mô tả sản phẩm',
            
        ];
    }
}