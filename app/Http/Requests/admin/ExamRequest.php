<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'name' => request()->route('id')
            ? 'required|unique:exams,name,'.request()->route('id')
            : 'required|unique:exams,name',
            'seconds' => 'required',
            'hours' => 'required',
            'minutes' => 'required',
            'limit' => 'required',

        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Vui lòng nhập tên bài thi',
            'name.unique' => 'Tên bài thi này đã được sử dụng',
            'hours.required' => 'Vui lòng nhập số giờ thi',
            'minutes.required' => 'Vui lòng nhập số phút thi',
            'seconds.required' => 'Vui lòng nhập số giây thi',
            'limit.required' => 'Vui lòng nhập só lần bài thi'
        ];
    }
}
