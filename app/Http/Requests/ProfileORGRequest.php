<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\MyValidationException;

class ProfileORGRequest extends FormRequest
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
            'id_pw' => 'required|numeric',
            'id_pc' => 'numeric',
            'alamat' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'lintang' => 'nullable|string|max:50',
            'bujur' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:50',
            'ketua' => 'required|string|max:100',
            'wakil_ketua' => 'required|string|max:100',
            'bendahara' => 'required|string|max:100',
            'sekretaris' => 'required|string|max:100',
            'telp_ketua' => 'required|digits_between:10,15',
            'telp_wakil' => 'required|digits_between:10,15',
            'telp_sekretaris' => 'required|digits_between:10,15',
            'telp_bendahara' => 'required|digits_between:10,15',
            'masa_khidmat' => 'required|string|max:9',
        ];
    }

    /**
     * @return string[]
     */

    public function messages()
    {
        return [
            'id_pw.required' => 'Field Kode Wilayah Wajib Diisi',
            'alamat.required' => 'Field Alamat Wajib Diisi',
            'kelurahan.required' => 'Field Kelurahan Wajib Diisi',
            'kecamatan.required' => 'Field Kecamatan Wajib Diisi',
            'kabupaten.required' => 'Field Kabupaten Wajib Diisi',
            'ketua.required' => 'Field Ketua Wajib Diisi',
            'wakil_ketua.required' => 'Field Wakil Ketua Wajib Diisi',
            'bendahara.required' => 'Field Bendahara Wajib Diisi',
            'sekretaris.required' => 'Field Sekretaris Wajib Diisi',
            'telp_ketua.required' => 'Field Nomor Telpon Ketua Wajib Diisi',
            'telp_wakil.required' => 'Field Nomor Telpon Wakil Wajib Diisi',
            'telp_sekretaris.required' => 'Field Nomor Telpon Sekretaris Wajib Diisi',
            'telp_bendahara.required' => 'Field Nomor Telpon Bendahara Wajib Diisi',
        ];
    }
}
