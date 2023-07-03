<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusSatpenRequest;
use App\Mail\RegisterMail;
use App\Models\FileRegister;
use App\Models\Kategori;
use App\Models\PengurusCabang;
use App\Models\Provinsi;
use App\Models\Satpen;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterUpdateRequest;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SatpenController extends Controller
{
    public function registerProses(RegisterRequest $request)
    {
        $registerNumber = "";
        $prefix = "A";

        try {
            $provinsi = Provinsi::where('kode_prov_kd', '=', $request->propinsi)->first();
            $cabang = PengurusCabang::find($request->cabang);
            $lastOfSatpen = Satpen::orderBy('id_satpen', 'desc')->first();

            if (!$provinsi) return redirect()->back()->with('error', 'Provinsi code not found');
            else if (!$cabang) return redirect()->back()->with('error', 'Cabang code not found');
            /**
             * Generate registration number
             */
            $orderedNumber = 0;
            if ($lastOfSatpen !== null) {
                $orderedNumber = (int) substr($lastOfSatpen->no_registrasi, strlen($lastOfSatpen->no_registrasi) - 4);
            }
            $orderedNumber = str_pad(++$orderedNumber, 4, '0', STR_PAD_LEFT);
            /**
             * When yayasan is not bhp nu append prefix A in generated number
             * Generated number is combined of Kode Provinsi + Kode Kabupaten + 4 digit ordered number
             */
            if (strtolower($request->yayasan) <> 'bhpnu') {
                $registerNumber .= $prefix. $provinsi->kode_prov. $cabang->kode_kab. $orderedNumber;
            } else {
                $registerNumber .= $provinsi->kode_prov. $cabang->kode_kab. $orderedNumber;
            }
            /**
             * Determined kategori of yayasan based on type yayasan and aset tanah
             */
            $makeCategorySatpen = SatpenController::makekategori(strtolower($request->yayasan), strtolower($request->aset_tanah));
            if ($makeCategorySatpen) {
                /**
                 * Store files
                 */
                if ($request->file('file_permohonan')->isValid()
                        && $request->file('file_rekom_pc')->isValid()
                        && $request->file('file_rekom_pw')->isValid()) {
                    $pathFilePermohonan = Storage::disk('uploads')->putFile(null, $request->file('file_permohonan'));
                    $pathFileRekomPC = Storage::disk('uploads')->putFile(null, $request->file('file_rekom_pc'));
                    $pathFileRekomPW = Storage::disk('uploads')->putFile(null, $request->file('file_rekom_pw'));
                }

                /**
                 * Make account on db.users
                 */
                $user = AuthController::register($registerNumber, $request->password);
                /**
                 * Store satpen on db.satpen
                 */
                try {
                    $satpen = Satpen::create([
                        'id_user' => $user->id_user,
                        'id_prov' => $provinsi->id_prov,
                        'id_kab' => $request->kabupaten,
                        'id_pc' => $cabang->id_pc,
                        'id_kategori' => $makeCategorySatpen->id_kategori,
                        'id_jenjang' => $request->jenjang,
                        'npsn' => $request->npsn,
                        'no_registrasi' => $registerNumber,
                        'nm_satpen' => $request->nm_satpen,
                        'yayasan' => strtolower($request->yayasan) <> "bhpnu" ? $request->nm_yayasan : $request->yayasan,
                        'kepsek' => $request->kepsek,
                        'telpon' => $request->telp,
                        'email' => $request->email,
                        'fax' => $request->fax,
                        'thn_berdiri' => $request->thn_berdiri,
                        'alamat' => $request->alamat,
                        'kelurahan' => $request->kelurahan,
                        'kecamatan' => $request->kecamatan,
                        'aset_tanah' => $request->aset_tanah,
                        'nm_pemilik' => $request->nm_pemilik,
                        'tgl_registrasi' => Date::now(),
                    ]);

                    FileRegister::insert([[
                        'id_satpen' => $satpen->id_satpen,
                        'mapfile' => 'surat_permohonan',
                        'nm_lembaga' => $satpen->nm_satpen,
                        'daerah' => '',
                        'nomor_surat' => $request->no_srt_permohonan,
                        'tgl_surat' => $request->tgl_srt_permohonan,
                        'filesurat' =>  $pathFilePermohonan,
                    ], [
                        'id_satpen' => $satpen->id_satpen,
                        'mapfile' => 'rekom_pc',
                        'daerah' => $request->cabang_rekom_pc,
                        'nm_lembaga' => $request->nm_rekom_pc,
                        'nomor_surat' => $request->no_srt_rekom_pc,
                        'tgl_surat' => $request->tgl_srt_rekom_pc,
                        'filesurat' =>  $pathFileRekomPC,
                    ], [
                        'id_satpen' => $satpen->id_satpen,
                        'mapfile' => 'rekom_pw',
                        'daerah' => $request->wilayah_rekom_pw,
                        'nm_lembaga' => $request->nm_rekom_pw,
                        'nomor_surat' => $request->no_srt_rekom_pw,
                        'tgl_surat' => $request->tgl_srt_rekom_pw,
                        'filesurat' =>  $pathFileRekomPW,
                    ]]);

                    (new AdminController())->updateSatpenStatus((new StatusSatpenRequest())
                        ->merge([
                            "status_verifikasi" => "permohonan",
                            "keterangan" => "",
                        ]),
                        $satpen);

                } catch (\Exception $e) {
//                    return redirect()->back()->with('error', $e);
                    dd($e);
                }
                Mail::to($satpen->email)->send(new RegisterMail($registerNumber));

                return redirect()->route('register.success')->with('regNumber', $registerNumber);
            }

            return redirect()->back()->with('error', 'cannot create satpen kategori');

        } catch (\Exception $e) {
//            return redirect()->back()->with('error', $e);
            dd($e);
        }
    }

    public function revisionProses(RegisterUpdateRequest $request)
    {
        $registerNumber = "";
        $prefix = "A";
        try {
            /**
             * Get satpen by satpen.userid
             */
            $provinsi = Provinsi::find($request->propinsi);
            $cabang = PengurusCabang::find($request->cabang);
            $satpen = Satpen::where('id_user', '=', auth()->user()->id_user)->first();
            /**
             * Validation when status must revisi
             */
            if (!$satpen) return redirect()->back()
                ->with('error', 'Forbidden to update satpen profile');
            /**
             * Validation when satpen id not releate with current user id
             */
            elseif ($satpen->status !== 'revisi' && $satpen->status !== 'expired') return redirect()->back()
                ->with('error', 'Satpen status is not revisi or expired');
            /**
             * Update registration number
             */
            $orderedNumber = substr($satpen->no_registrasi, strlen($satpen->no_registrasi) - 4);
            if (strtolower($request->yayasan) <> 'bhpnu') {
                $registerNumber .= $prefix. $provinsi->kode_prov. $cabang->kode_kab. $orderedNumber;
            } else {
                $registerNumber .= $provinsi->kode_prov. $cabang->kode_kab. $orderedNumber;
            }
            /**
             * Determine kategori
             */
            $makeCategorySatpen = SatpenController::makekategori(strtolower($request->yayasan), strtolower($request->aset_tanah));
            if ($makeCategorySatpen) {
                /**
                 * Replace and store files
                 */
                if ($request->file('file_permohonan')
                    && $request->file('file_permohonan')->isValid()) {
                    $pathFilePermohonan = Storage::disk('uploads')->putFile(null, $request->file('file_permohonan'));
                    Storage::disk("uploads")->delete($satpen->filereg[0]->filesurat);
                } else {
                    $pathFilePermohonan = $satpen->filereg[0]->filesurat;
                }
                if ($request->file('file_rekom_pc')
                    && $request->file('file_rekom_pc')->isValid()) {
                    $pathFileRekomPC = Storage::disk('uploads')->putFile(null, $request->file('file_rekom_pc'));
                    Storage::disk("uploads")->delete($satpen->filereg[1]->filesurat);
                } else {
                    $pathFileRekomPC = $satpen->filereg[1]->filesurat;
                }
                if ($request->file('file_rekom_pw')
                    && $request->file('file_rekom_pw')->isValid()) {
                    $pathFileRekomPW = Storage::disk('uploads')->putFile(null, $request->file('file_rekom_pw'));
                    Storage::disk("uploads")->delete($satpen->filereg[2]->filesurat);
                } else {
                    $pathFileRekomPW = $satpen->filereg[2]->filesurat;
                }
                /**
                 * Update account db.users.username
                 */
                AuthController::updateUsername($registerNumber);
                /**
                 * Update satpen on db.satpen
                 */
                $satpen->update([
                    'id_prov' => $provinsi->id_prov,
                    'id_kab' => $request->kabupaten,
                    'id_kategori' => $makeCategorySatpen->id_kategori,
                    'id_jenjang' => $request->jenjang,
                    'id_pc' => $cabang->id_pc,
                    'npsn' => $request->npsn,
                    'no_registrasi' => $registerNumber,
                    'nm_satpen' => $request->nm_satpen,
                    'yayasan' => strtolower($request->yayasan) <> "bhpnu" ? $request->nm_yayasan : $request->yayasan,
                    'kepsek' => $request->kepsek,
                    'telpon' => $request->telp,
                    'email' => $request->email,
                    'fax' => $request->fax,
                    'thn_berdiri' => $request->thn_berdiri,
                    'alamat' => $request->alamat,
                    'kelurahan' => $request->kelurahan,
                    'kecamatan' => $request->kecamatan,
                    'aset_tanah' => $request->aset_tanah,
                    'nm_pemilik' => $request->nm_pemilik,
                ]);
                /**
                 * Update file register
                 */
                FileRegister::find($satpen->filereg[0]->id_file)->update([
                    'nm_lembaga' => $satpen->nm_satpen,
                    'nomor_surat' => $request->no_srt_permohonan,
                    'tgl_surat' => $request->tgl_srt_permohonan,
                    'filesurat' =>  $pathFilePermohonan,
                ]);
                FileRegister::find($satpen->filereg[1]->id_file)->update([
                    'daerah' => $request->cabang_rekom_pc,
                    'nm_lembaga' => $request->nm_rekom_pc,
                    'nomor_surat' => $request->no_srt_rekom_pc,
                    'tgl_surat' => $request->tgl_srt_rekom_pc,
                    'filesurat' =>  $pathFileRekomPC,
                ]);
                FileRegister::find($satpen->filereg[2]->id_file)->update([
                    'daerah' => $request->wilayah_rekom_pw,
                    'nm_lembaga' => $request->nm_rekom_pw,
                    'nomor_surat' => $request->no_srt_rekom_pw,
                    'tgl_surat' => $request->tgl_srt_rekom_pw,
                    'filesurat' =>  $pathFileRekomPW,
                ]);

                if ($satpen->status == "revisi") {
                    (new AdminController())->updateSatpenStatus((new StatusSatpenRequest())
                        ->merge([
                            "status_verifikasi" => "permohonan",
                            "keterangan" => "permohonan setelah revisi",
                        ]),
                        $satpen);
                } elseif ($satpen->status == "expired") {
                    (new AdminController())->updateSatpenStatus((new StatusSatpenRequest())
                        ->merge([
                            "status_verifikasi" => "perpanjangan",
                            "keterangan" => "permohonan perpanjangan dokumen",
                        ]),
                        $satpen);
                }

                return redirect()->route('mysatpen')->with('success', 'satpen berhasil di update');
            }

            throw new \Exception("cannot create satpen kategori");

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function downloadDocument($document) {
        try {
            $satpenData = Satpen::select('id_satpen')->with('file')
                ->where('id_user', auth()->user()->id_user)
                ->first();
            if ($satpenData->file)
            {
                if ($document == 'piagam'
                    && $satpenData->file[0]->nm_file
                    && Storage::exists("generated/piagam/".$satpenData->file[0]->nm_file)) {
                    return response()->download(
                        storage_path("app/generated/piagam/".$satpenData->file[0]->nm_file));
                }
                elseif ($document == 'sk'
                    && $satpenData->file[1]->nm_file
                    && Storage::exists("generated/sk/".$satpenData->file[1]->nm_file)) {
                    return response()->download(
                        storage_path("app/generated/sk/".$satpenData->file[1]->nm_file));
                }
                else return redirect()->back()->with('error', 'dokumen tidak ditemukan');
            }
            return redirect()->back()->with('error', 'Document belum selesai');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    private static function makekategori(string $yayasan, string $statusTanah) : ?Kategori
    {
        $kategori = null;
        /**
         * When status yayasan is BHPNU and tanah milik nu (jam'iyah)
         */
        if ($yayasan == 'bhpnu' && $statusTanah == 'jamiyah') {
            $kategori = 'A';
        }
        /**
         * When status yayasan is BHPNU and tanah milik masyarakat nu
         */
        elseif ($yayasan == 'bhpnu' && $statusTanah <> 'jamiyah') {
            $kategori = 'B';
        }
        /**
         * When status yayasan is non BHPNU and tanah milik nu (jam'iyah)
         */
        elseif ($yayasan <> 'bhpnu' && $statusTanah == 'jamiyah') {
            $kategori = 'C';
        }
        /**
         * When status yayasan is non BHPNU and tanah milik masyarakat nu
         */
        elseif ($yayasan <> 'bhpnu' && $statusTanah <> 'jamiyah') {
            $kategori = 'D';
        }
        return Kategori::where('nm_kategori', '=', $kategori)->first();
    }
}
