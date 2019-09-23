<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'title' => 'bail|required|min:2|max:10',
            'url' => 'bail|nullable|min:3|max:50',
            'class' => 'bail|nullable|min:2|max:50',
            'order' => 'bail|required|integer',
            'parent_id' => 'bail|required|integer',
        ];
    }

    public function messages() {
        return [
            'parent_id.required' => '请选择上级菜单',
            'parent_id.integer' => '上级菜单必须为整数',
            'order.integer' => '排序必须为整数',
            'order.required' => '请填写排序',
        ];
    }
}
