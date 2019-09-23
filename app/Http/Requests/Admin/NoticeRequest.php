<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            //
            'title' => 'required|string|min:5|max:30',
            'body' => 'required|string|min:5|max:500',
        ];
    }

    public function messages() {
        return [
            'body.required' => '请填写内容',
            'body.min' => '内容最少5个字符',
            'body.max' => '内容最多500个字符',

        ];
    }
}
