<?php

namespace App\Http\Requests;

use App\Exceptions\MyValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class VirtualNPSNRequest extends FormRequest
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
            'nama_sekolah' => 'required',
            'jenjang' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:virtual_npsn,email|email',
            'nik_kepsek' => 'required|unique:virtual_npsn,nik_kepsek|min:16|max:16',
        ];
    }
}
