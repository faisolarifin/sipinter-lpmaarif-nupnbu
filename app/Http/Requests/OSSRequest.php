<?php

namespace App\Http\Requests;

use App\Exceptions\MyValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class OSSRequest extends FormRequest
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
            'email' => 'required|email',
            'npwp' => 'required|string',
            'no_whatsapp' => 'required|string',
            'bukti_bayar' => 'nullable|file|mimes:pdf,jpg,jpeg,png,svg|max:1024',
            'intansi_izin_lama' => 'nullable|string',
            'nomor_izin_lama' => 'nullable|string',
            'tgl_terbit_izin_lama' => 'nullable|date',
            'tgl_expired_izin_lama' => 'nullable|date',
            'file_izin_lama' => 'nullable|file|mimes:pdf|max:1024',
            'lokasi_usaha' => 'required|string',
            'luas_lahan_usaha' => 'required|numeric',
            'apakah_sudah_menempati_lahan' => 'required|in:Sudah,Belum',
            'status_lahan' => 'required|in:Milik Sendiri,Sewa,Pinjam Pakai',
            'ms_instansi_izin' => 'nullable|string',
            'ms_nomor_izin' => 'nullable|string',
            'ms_tgl_terbit' => 'nullable|date',
            'ms_tgl_expired' => 'nullable|date',
            'ms_file_lampiran' => 'nullable|file|mimes:pdf|max:1024',
            'sw_pemilik_lahan' => 'nullable|string',
            'sw_nomor_perjanjian' => 'nullable|string',
            'sw_tgl_perjanjian' => 'nullable|date',
            'sw_tgl_expired' => 'nullable|date',
            'sw_file_lampiran' => 'nullable|file|mimes:pdf|max:1024',
            'pp_pemilik_lahan' => 'nullable|string',
            'pp_nomor_perjanjian' => 'nullable|string',
            'pp_tgl_perjanjian' => 'nullable|date',
            'pp_tgl_expired' => 'nullable|date',
            'pp_file_lampiran' => 'nullable|file|mimes:pdf|max:1024',
            'apakah_memerlukan_bangunan_baru' => 'required|in:Iya,Tidak',
            'sudah_ada_bangunan' => 'required|in:Sudah,Belum',
            'status_bangunan_usaha' => 'required|in:Milik Sendiri,Sewa,Pinjam Pakai',
            'jumlah_bangunan' => 'required|integer',
            'apakah_memiliki_imb' => 'nullable|in:Iya,Tidak',
            'imb_jml_bangunan' => 'nullable|integer',
            'imb_pejabat_penerbit_izin' => 'nullable|string',
            'imb_nomor' => 'nullable|string',
            'imb_tgl_terbit' => 'nullable|date',
            'imb_tgl_expired' => 'nullable|date',
            'imb_file_lampiran' => 'nullable|file|mimes:pdf|max:1024',
            'apakah_memiliki_sertifikat_slf' => 'nullable|in:Iya,Tidak',
            'slf_pejabat_penerbit' => 'nullable|string',
            'slf_nomor' => 'nullable|string',
            'slf_tgl_terbit' => 'nullable|date',
            'slf_tgl_expired' => 'nullable|date',
            'slf_file_lampiran' => 'nullable|file|mimes:pdf|max:1024',
            'apakah_lokasi_sekolah_lintas_perbatasan' => 'required|in:Iya,Tidak',
            'alamat_sekolah' => 'required|string',
            'propinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'kode_pos' => 'required|string',
            'file_peta_polygon' => 'nullable|file|mimes:zip|max:1024',
            'apakah_proyek_strategi_nasional' => 'required|in:Iya,Tidak',
            'rencana_teknis_bangunan' => 'nullable|file|mimes:pdf|max:1024',
            'kawasan_lokasi_usaha' => 'required|in:Diluar Kawasan,Didalam Kawasan',
            'klu_nama_kawasan_industri' => 'nullable|string',
            'apakah_memiliki_kkpr' => 'nullable|in:Iya,Tidak',
            'pejabat_penerbit_kkpr' => 'nullable|string',
            'nomor_kkpr' => 'nullable|string',
            'tgl_terbit_kkpr' => 'nullable|date',
            'tgl_expired_kkpr' => 'nullable|date',
            'file_lampiran_kkpr' => 'nullable|file|mimes:pdf|max:1024',
            'dri_pembelian_tanah' => 'required|numeric',
            'dri_bangunan' => 'required|numeric',
            'dri_mesin_dalam_negeri' => 'required|numeric',
            'dri_mesin_impor' => 'required|numeric',
            'dri_investasi' => 'required|numeric',
            'dri_modal_kerja_3_bulan' => 'required|numeric',
            'tgl_mulai_beroperasi' => 'required|string',
            'jml_pegawai_pria' => 'required|integer',
            'jml_pegawai_wanita' => 'required|integer',
            'jml_pegawai_asing' => 'required|integer',
            'apakah_memiliki_izin_amdal' => 'nullable|in:Iya,Tidak',
            'amdal_pejabat_penerbit' => 'nullable|string',
            'amdal_nomor_izin' => 'nullable|string',
            'amdal_tgl_terbit' => 'nullable|date',
            'amdal_tgl_expired' => 'nullable|date',
            'amdal_file_lampiran' => 'nullable|file|mimes:pdf|max:1024',
            'apakah_memiliki_uklupl' => 'nullable|in:Iya,Tidak',
            'uklupl_pejabat_penerbit' => 'nullable|string',
            'uklupl_nomor_izin' => 'nullable|string',
            'uklupl_tgl_terbit' => 'nullable|date',
            'uklupl_tgl_expired' => 'nullable|date',
            'uklupl_file_lampiran' => 'nullable|file|mimes:pdf|max:1024',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Jika file di-upload, simpan ke storage sementara
            if ($this->hasFile('bukti_bayar')) {
                $file = $this->file('bukti_bayar');
                $path = $file->storeAs('uploads/temp', $file->getClientOriginalName());
                session(['temp_file_path' => $path]);
            }
        });
    }

}
