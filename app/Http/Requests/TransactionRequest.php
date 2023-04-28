<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'deposit_amount' => 'required|numeric|min:200000',
        ];
    }

    public function messages()
    {
        return [
            'deposit_amount.required' => 'Bạn nhải nhập số tiền đã chuyển',
            'deposit_amount.min' => 'Số tiền chuyển ít nhất là 200000',
        ];

    }
}
