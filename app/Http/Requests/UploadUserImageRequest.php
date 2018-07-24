<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadUserImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *确定用户是否被授权发出此请求。
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *获取应用于请求的验证规则。
     * @return array
     */
    public function rules()
    {
        $validation['profile_image'] = 'required|mimes:jpeg,gif,png';

        return $validation;
    }
}
