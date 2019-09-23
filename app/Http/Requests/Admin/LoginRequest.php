<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ];
    }

    public function messages() {
        return [
            'email.required' => '请填写邮箱',
            'email.unique' => '该邮箱已被注册',
            'email.email' => '邮箱格式错误',
            'password.required' => '请填写密码',
            'captcha.required' => '请填写验证码',
            'captcha.captcha' => '验证码错误',
        ];
    }
}
