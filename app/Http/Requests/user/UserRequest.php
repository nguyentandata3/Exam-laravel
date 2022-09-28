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
                ? 'required|unique:users,username,'.request()->route('id')
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
                : 'required|confirmed|min:7',
        ];
    }

    public function messages() 
    {
        return [
            'email.required' => 'Please input Email',
            'email.unique' => 'This Email already exists',
            'email.email' => "This is not an email",
            'password.required' => 'Please input Password',
            'password.confirmed' => 'Password Confirm is not true',
            'password.min' => 'Password is min 7 characters',
            'fullname.required' => 'Please input Fullname',
            'phone.required' => 'Please input Phone',
            'avatar.required' => 'Please choose an Avatar',
            'avatar.mimes' => 'Avatar is one of the following formats: jng, bmp, png',
            'sex.required' => 'Please choose a Gender'
        ];
    }
}
