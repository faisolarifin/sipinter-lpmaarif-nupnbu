<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUpdateRequest extends FormRequest
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
            "npsn" => "required|size:8",
            "kabupaten" => "required|numeric",
            "propinsi" => "required|numeric",
            "jenjang" => "required|numeric",
            "nm_satpen" => "required|string",
            "yayasan" => "required|string",
            "kepsek" => "required|string",
            "telp" => "required|string",
            "email" => "required|email|string",
            "thn_berdiri" => "required|size:4",
            "kelurahan" => "required|string",
            "alamat" => "required|string",
            "aset_tanah" => "required|in:jamiyah,masyarakat nu",
            "nm_pemilik" => "required|string",
            "no_srt_permohonan" => "required",
            "tgl_srt_permohonan" => "required",
            "nm_rekom_pc" => "required",
            "cabang_rekom_pc" => "required",
            "no_srt_rekom_pc" => "required",
            "tgl_srt_rekom_pc" => "required",
            "nm_rekom_pw" => "required",
            "wilayah_rekom_pw" => "required",
            "no_srt_rekom_pw" => "required",
            "tgl_srt_rekom_pw" => "required",
        ];
    }

    /**
     * @return string[]
     */

    public function messages()
    {
        return [
            'kode_kab.required' => 'Please enter a valid kode kabupaten',
        ];
    }
}
