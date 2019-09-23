<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        switch (\Request::method()) {
            case 'POST':
                return [
                    'title' => 'bail|required|min:2|max:20',
                    'name' => 'bail|required|min:2|max:40|unique:permissions,name',
                    'group' => 'nullable|min:2|max:50',
                ];
                break;
            case 'PUT':
                return [
                    'title' => 'required|min:2|max:20',
                    'name' => 'required|min:2|max:40|unique:permissions,name,' . request()->route('permission')->id,
                    'group' => 'nullable|min:2|max:50',
                ];
                break;
        }

    }

    public function messages() {
        return [
            'name.required' => '链接 不能为空',
            'name.min' => '链接 至少为2个字符',
            'name.max' => '链接 最大为40个字符',
            'name.unique' => '链接 已经存在',
            'group.min' => '分组 至少为2个字符',
            'group.max' => '分组 最大为40个字符',
        ];
    }
}
