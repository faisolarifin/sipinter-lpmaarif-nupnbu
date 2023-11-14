<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\MyValidationException;

class RegisterRequest extends FormRequest
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
            "npsn" => "required|unique:satpen,npsn|size:8",
            "kabupaten" => "required|numeric",
            "propinsi" => "required|numeric",
            "cabang" => "required|numeric",
            "jenjang" => "required|numeric",
            "nm_satpen" => "required|string",
            "yayasan" => "required|string",
            "kepsek" => "required|string",
            "telp" => "required|string",
            "email" => "required|email|string|unique:satpen,email",
            "thn_berdiri" => "required|size:4",
            "kelurahan" => "required|string",
            "alamat" => "required|string",
            "aset_tanah" => "required|in:jamiyah,masyarakat nu",
            "nm_pemilik" => "required|string",
            "password" => "required",
            "passconfirm" => "required|same:password",
            "no_srt_permohonan" => "required",
            "tgl_srt_permohonan" => "required",
            "file_permohonan" => "required|file|mimes:pdf|max:1024",
            "nm_rekom_pc" => "required",
            "cabang_rekom_pc" => "required",
            "no_srt_rekom_pc" => "required",
            "tgl_srt_rekom_pc" => "required",
            "file_rekom_pc" => "required|file|mimes:pdf|max:1024",
            "nm_rekom_pw" => "required",
            "wilayah_rekom_pw" => "required",
            "no_srt_rekom_pw" => "required",
            "tgl_srt_rekom_pw" => "required",
            "file_rekom_pw" => "required|file|mimes:pdf|max:1024",
        ];
    }

    /**
     * @return string[]
     */

    public function messages()
    {
        return [
            'npsn.required' => 'Please enter a valid npsn',
        ];
    }
}
