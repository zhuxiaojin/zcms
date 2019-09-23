<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PictureRequest extends FormRequest
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
            'title' => 'bail|required|min:3|max:40',
            'body' => 'bail|nullable|min:3|max:200',
            'media' => 'bail|required',
        ];
    }

    public function messages() {
        return [
            'body.min' => '相册描述最少3个字符',
            'body.max' => '相册描述最多200个字符',
            'media.required' => '请上传相册文件',
        ];

    }
}
