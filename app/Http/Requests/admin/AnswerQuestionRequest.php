<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class AnswerQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'level' => request()->route('id')
                ? 'required:answer_questions,level,'.request()->route('id')
                : 'required:answer_questions,level',
            'question[]' => request()->route('id')
                ? 'required:answer_questions,level,'.request()->route('id')
                : 'required:answer_questions,level',
            'image' => request()->route('id')
                ? 'image|mimes:jpeg,png,jpg,gif,svg'
                : 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'answer' => request()->route('id')
                ? 'required:answer_questions,level,'.request()->route('id')
                : 'required:answer_questions,level',

                
        ];
    }

    public function messages() 
    {
        return [
            'level.required' => 'Vui lòng chọn cấp đọ',
            'question[question].required' => 'Vui lòng nhập câu hỏi',
            'image.required' => 'Vui lòng chọn hình ảnh',
            'answer.required' => 'Vui lòng nhập đáp án',
        ];
    }
}
