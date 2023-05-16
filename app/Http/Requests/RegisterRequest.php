<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(1)],
            'name' => ['required', 'min:6', 'max:20'],
            'password' => ['required', 'min:6', 'max:20'],
            'c_password' => ['required', 'same:password']
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email chưa đúng định dạng',
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải nhiều hơn 5 kí tự',
            'name.max' => 'Name phải ít hơn 20 ký tự',
            'password.required' => 'Password không được để trống',
            'password.min' => 'Password phải nhiều hơn 5 ký tự',
            'password.max' => 'Password phải ít hơn 20 ký tự',
            'c_password.requỉed' => 'Trường này không được để trống',
            'c_password.same' => 'Mật khẩu chưa trùng khớp',
            'email.unique' => 'Emai đã tồn tại',
        ];
    }
}
