<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
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
            'url' => 'bail|required|url',
            'title' => 'bail|required|min:3|max:30',
            'keywords' => 'bail|nullable|min:3|max:60',
            'description' => 'bail|nullable|min:3|max:200',
//            'ico'=>'bail|nullable|min:3|max:200',
            'num' => 'bail|nullable|min:8|max:50',
        ];
    }
    public function messages() {
        return [
            'url.required' => '请填写域名',
            'url.url' => '域名格式错误，正确格式为http://www.xxx.com',
            'title.required' => '请填写网站标题',
            'title.min' => ' 网站标题最少3个字符',
            'title.max' => ' 网站标题最多30个字符',
            'keywords.required' => '请填写关键字',
            'keywords.min' => ' 关键字最少3个字符',
            'keywords.max' => ' 关键字最多60个字符',
            'description.required' => '请填写描述',
            'description.min' => ' 描述最少3个字符',
            'description.max' => ' 描述最多200个字符',
            'num.required' => '请填写备案号',
            'num.min' => ' 备案号最少8个字符',
            'num.max' => ' 备案号最多50个字符',
        ];
    }
}
