<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'fullname' => 'required|min:5||max:25',
            'username' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',  
            're_password' => 'required|same:password',
            'address' => 'required',
            'phone' => 'required|numeric|digits:10',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Bạn chưa nhập tên',
            'fullname.min' => 'Tên ít nhất 5 ký tự',
            'fullname.max' => 'Tên không vượt quá 25 ký tự',
            'username.required' => 'Bạn chưa nhập username',
            'username.unique' => 'Username đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không quá 20 ký tự',
            're_password.same' => 'Nhập mật khẩu không đúng',
            're_password.required' => 'Vui lòng nhập lại mật khẩu',  
            'address.required' => 'Bạn chưa nhập địa chỉ',    
            'phone.required' => 'Bạn chưa nhập số điện thoại',    
            'phone.digits' => 'Điện thoại chỉ có 10 số',
            'phone.numeric' => 'Điện thoại chỉ được nhập số'   
        ];
    }
}
