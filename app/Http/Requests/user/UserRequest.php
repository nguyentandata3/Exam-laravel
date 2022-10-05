<?php

namespace App\Http\Requests\user;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => request()->route('id')
                ? 'unique:users,username,'.request()->route('id')
                : 'required|unique:users',
            'fullname' => 'required',
            'sex' => 'required',
            'email' => request()->route('id')
                ? 'required|email|unique:users,email,'.request()->route('id')
                : 'required|email|unique:users',
            //chữ name ở sau nếu trùng ở trước có thể bỏ
            //'name' => 'required|unique:categories'
            'password' => request()->route('id')
                ? 'confirmed'
                : 'required|confirmed|min:8',
        ];
    }

    public function messages() 
    {
        return [
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'email.email' => "Vui lòng nhập đúng email",
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.confirmed' => 'Mật khẩu xác nhận không đúng',
            'password.min' => 'Mật khẩu ít nhất phải 8 ký tự',
            'fullname.required' => 'Vui lòng nhập đầy đủ Họ tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'avatar.required' => 'Vui lòng chọn ảnh đại diện',
            'avatar.mimes' => 'Ảnh đại diện phải 1 trong các dạng: jng, bmp, png',
            'sex.required' => 'Vui lòng chọn giới tính'
        ];
    }
}
