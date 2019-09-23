<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class OptionRequest extends FormRequest
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
                    'key' => 'bail|required|min:3|max:20|unique:options,key',
                    'value' => 'bail|required|min:1|max:500',
                    'name' => 'bail|required|min:3|max:20',
                    'description' => 'bail|nullable|min:3|max:100',
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'key' => 'bail|required|min:3|max:20|unique:options,key,'.request()->route('option')->id,
                    'value' => 'bail|required|min:1|max:500',
                    'name' => 'bail|required|min:3|max:20',
                    'description' => 'bail|nullable|min:3|max:100',
                ];
                break;
        }
    }

}
