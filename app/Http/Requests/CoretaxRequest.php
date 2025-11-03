<?php

namespace App\Http\Requests;

use App\Exceptions\MyValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CoretaxRequest extends FormRequest
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
            'nitku' => 'nullable|string|max:255',
            'nm_pic' => 'required|string|max:100',
            'nik_pic' => 'required|string|max:20',
            'whatsapp_pic' => 'required|string|max:20',
        ];
    }

    /**
     * @return string[]
     */

     public function messages()
     {
         return [
             'nm_pic.required' => 'Field Nama PIC Wajib Diisi',
             'nik_pic.required' => 'Field NIK PIC Wajib Diisi',
             'whatsapp_pic.required' => 'Field Nomor Whatsapp PIC Wajib Diisi',
         ];
     }

    
}
