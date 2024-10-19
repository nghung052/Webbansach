<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'fullname' => 'required|regex:/(^[\pL0-9 ]+$)/u',
            'username' => 'required|email|unique:users,email',
            'address' => 'required',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required|min:6|max:25',

            // 'new_password' => 'required|min:6|max:20',
            // 're_password' => 'required|same:new_password',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Bạn chưa nhập tên',
            'fullname.regex' => 'Tên nhà xuất bản không được phép có ký tự đặc biệt',
            'username.required' => 'Bạn chưa nhập tên đang nhập',
            'username.unique' => 'Username đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không quá 20 ký tự',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'phone.required' => 'Bạn chưa nhập số điện thoại',    
            'phone.digits' => 'Điện thoại chỉ có 10 số',
            'phone.numeric' => 'Điện thoại chỉ được nhập số', 

            // 're_password.same' => 'Xác nhận mật khẩu không đúng',
            // 'new_password.min' => 'Mật khẩu ít nhất 6 ký tự',
            // 'new_password.max' => 'Mật khẩu không quá 20 ký tự',
        ];
    }
}
