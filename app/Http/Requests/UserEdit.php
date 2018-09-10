<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEdit extends FormRequest
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

            'password'=>'required|min:5',
            'fullname'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Password nhiều hơn 6 ký tự',
            'fullname.required'=>'Vui lòng nhập fullname',
           
        ];
    }
}
