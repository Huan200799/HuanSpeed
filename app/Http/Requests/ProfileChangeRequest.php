<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileChangeRequest extends FormRequest
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
            'name_user' => 'required|min:2|max:30',
            'phone' => 'required|min:10|max:11',
            'address' => 'required|min:2|max:255',
        ];
    }
    public function messages()
    {
        return[
            'name_user.min'=>'Tên phải có ít nhất 2 kí tự',
            'name_user.max'=>'Tên không quá 30 kí tự',
            'phone.min'=>'Phone có ít nhất 10 kí tự',
            'phone.max'=>'Phone không quá 11 kí tự',
            'address.min'=>'Địa chỉ có ít nhất 2 kí tự',
            'address.max'=>'Địa chỉ không quá 255 kí tự',
            'image.avatar' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
        ];
    }
}
