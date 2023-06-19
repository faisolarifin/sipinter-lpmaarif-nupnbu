<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\MyValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
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
            "username" => "required",
            "password" => "required",
        ];
    }

    /**
     * @return string[]
     */

    public function messages()
    {
        return [
            'username.required' => 'Please enter a valid username',
            'password.required' => 'Please enter a valid password',
        ];
    }
}
