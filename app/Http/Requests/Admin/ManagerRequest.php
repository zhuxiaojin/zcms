<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ManagerRequest extends FormRequest
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
        switch (Request::method()) {
            case 'POST':
                return [
                    'email' => 'bail|required|email|unique:managers,email',
                    'name' => 'bail|required|min:2|max:8',
                    'password' => 'bail|required|confirmed|min:6|max:20',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'email' => 'bail|required|email|unique:managers,email,' . request()->route('manager')->id,
                    'name' => 'bail|required|min:2|max:8',
                    'password' => 'bail|nullable|confirmed|min:6|max:20',
                ];
                break;
        }

    }

    public function messages() {
        return [

        ];
    }
}
