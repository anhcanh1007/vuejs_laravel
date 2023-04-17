<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => ['required', 'email'],
            'name' => ['required', 'min:6', 'max:20'],
            'password' => ['required', 'min:6', 'max:20'],
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
        ];
    }
}
