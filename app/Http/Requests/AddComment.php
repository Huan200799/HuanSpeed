<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddComment extends FormRequest
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
            //
            'name' => 'required|min:6',
            'content' => 'required|min:2',
        ];
    }
    public function messages()
    {
        return[
            'name.min' => 'Tên phải có ít nhất 6 kí tự',
            'content.min'=>'Nội dung phải có ít nhất 2 kí tự',
        ];
    }
}
