<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:32',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages(){
        return [
            'email.required' => '该邮箱已经被使用或者邮箱未填写',
            'email.email' => '该邮箱格式不符合',
            'password.required' => '未填写密码',
            'password.min' => '密码最小为6个字符',
            'password.max' => '密码最大为32个字符',
            'captcha.required' => '验证码未填写',
            'captcha.captcha' => '验证码错误',
        ];
    }
}
