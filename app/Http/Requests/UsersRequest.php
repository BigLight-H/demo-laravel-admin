<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
    public function rules()
    {
        $info = new User();
        return [
            'email' => ['required','email',function($attribute, $value, $fail) use($info) {
                $num = $info::query()->where('email', $value)->count();
                if ($num) {
                    return $fail('邮箱已存在!');
                }
            }],
            'name' => ['required', 'min:3', function($attribute, $value, $fail) use($info) {
                $num = $info::query()->where('name', $value)->count();
                if ($num) {
                    return $fail('昵称已存在!');
                }
            }],
            'password' => ['required', 'min:6', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式错误',
            'name.required' => '昵称不能为空',
            'name.min' => '昵称长度不能小于3',
            'password.min' => '密码长度不能小于6位',
            'password.confirmed' => '两次密码不一致',
        ];
    }
}
