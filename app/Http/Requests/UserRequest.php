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
            'username' => 'unique:users,username|min:5',
            'password'=>'required|min:5',
            'fullname'=>'required',
            'picture'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'username.unique'=>'Tên đã trùng vui lòng nhập lại!',
            'username.min'=>'Username nhiều hơn 5 ký tự',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Password nhiều hơn 6 ký tự',
            'fullname.required'=>'Vui lòng nhập fullname',
            'picture.required'=>'Vui lòng chọn avata',
        ];
    }
}
