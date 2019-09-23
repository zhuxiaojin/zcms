<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules() {
        return [
            //
            'name' => 'required|min:3|max:30',
            'editor-markdown-doc' => 'filled',
            'editor-html-code' => 'filled',
            'media' => 'required',
        ];
    }

    public function messages() {
        return [
            'editor-markdown-doc.filled' => '请填写内容',
            'editor-html-code.filled' => '请填写内容',
            'media.required' => '请上传产品图集',
        ];
    }
}
