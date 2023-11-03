<?php

namespace App\Http\Requests;

use App\Exceptions\MyValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SyncRequest extends FormRequest
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
            'npsn' => 'required|unique:satpen,npsn|size:8',
            'thn_berdiri' => 'nullable|size:4',
            'yayasan' => 'required',
            'jenjang' => 'required',
            'telp' => 'nullable|max:13',
            'email' => 'nullable|email'
        ];
    }
}
