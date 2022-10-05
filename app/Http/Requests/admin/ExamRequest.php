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
            'name.required' => 'Please input Name',
            'name.unique' => 'This Name already exists',
            'hours.required' => 'Please input Hours',
            'minutes.required' => 'Please input Minutes',
            'seconds.required' => 'Please input Seconds',
            'limit.required' => 'Please input Limit Exam'
        ];
    }
}
