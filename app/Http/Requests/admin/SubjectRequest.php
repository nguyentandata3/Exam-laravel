<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class SubjectRequest extends FormRequest
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
            ? 'required|unique:subjects,name,'.request()->route('id')
            : 'required|unique:subjects,name'
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'Please input name',
            'name.unique' => 'This name already exists',
        ];
    }
}
