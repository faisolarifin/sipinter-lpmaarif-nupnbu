<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\FileRegister;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\PengurusCabang;
use App\Models\Provinsi;
use App\Models\Satpen;
use App\Models\Timeline;
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
                        'yayasan' => $request->yayasan <> "bhpnu" ? $request->nm_yayasan : $request->yayasan,
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
                        'status' => 'permohonan',
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

                    Timeline::create([
                        'id_satpen' => $satpen->id_satpen,
                        'status_verifikasi' => 'permohonan',
                        'tgl_status' => Date::now(),
                        'keterangan' => '',
                    ]);

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
            $satpen = Satpen::where('id_user', '=', auth()->user()->id_user)->first();
            /**
             * Validation when status must revisi
             */
            if (!$satpen) return redirect()->back()
                ->with('error', 'Forbidden to update satpen profile');
            /**
             * Validation when satpen id not releate with current user id
             */
            elseif ($satpen->status !== 'revisi') return redirect()->back()
                ->with('error', 'Satpen status is not revisi');
            /**
             * Update registration number
             */
            $orderedNumber = substr($satpen->no_registrasi, strlen($satpen->no_registrasi) - 4);
            if (strtolower($request->yayasan) <> 'bhpnu') {
                $registerNumber .= $prefix. $request->propinsi. $request->kabupaten. $orderedNumber;
            } else {
                $registerNumber .= $request->propinsi. $request->kabupaten. $orderedNumber;
            }
            /**
             * Determine kategori
             */
            $makeCategorySatpen = SatpenController::makekategori(strtolower($request->yayasan), strtolower($request->aset_tanah));
            if ($makeCategorySatpen) {
                /**
                 * Update account db.users.username
                 */
                AuthController::updateUsername($registerNumber);
                /**
                 * Update satpen on db.satpen
                 */
                $satpen->update([
                    'id_prov' => $request->propinsi,
                    'id_kab' => $request->kabupaten,
                    'id_kategori' => $makeCategorySatpen->id_kategori,
                    'id_jenjang' => $request->jenjang,
                    'npsn' => $request->npsn,
                    'no_registrasi' => $registerNumber,
                    'nm_satpen' => $request->nm_satpen,
                    'yayasan' => $request->yayasan,
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
                    'status' => 'permohonan',
                ]);

                Timeline::create([
                    'id_satpen' => $satpen->id_satpen,
                    'status_verifikasi' => 'permohonan',
                    'tgl_status' => Date::now(),
                    'keterangan' => 'Permohonan setelah revisi',
                ]);

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
