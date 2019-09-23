<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleHasPermissionsRequest extends FormRequest
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
            case 'PUT':
                return [
                    'permissions' => 'required'
                ];
                break;
        }
    }

    public function messages() {
        return [
            'permissions.required' => '请至少选择一个权限分配!',
        ];
    }
}
