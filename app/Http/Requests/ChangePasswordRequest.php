<?php

namespace App\Http\Requests;

use App\Exceptions\MyValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @return void
     * @throws MyValidationException
     */
    protected function failedValidation(Validator $validator) : MyValidationException
    {
        throw new MyValidationException($validator);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password_lama' => 'required',
            'password_baru' => 'required',
            'password_konfirm' => 'required|same:password_baru',
        ];
    }
}
