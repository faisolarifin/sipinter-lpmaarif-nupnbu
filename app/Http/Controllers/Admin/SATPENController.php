<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\CatchErrorException;
use App\Export\ExportDocument;
use App\Helpers\GenerateQr;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Settings;
use App\Http\Requests\StatusSatpenRequest;
use App\Models\FileRegister;
use App\Models\FileUpload;
use App\Models\Jenjang;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\PengurusCabang;
use App\Models\Provinsi;
use App\Models\Satpen;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SATPENController extends Controller
{
    public function dashboardPage() {

        try {
            $provFilter = null;
            $listProvinsi = Provinsi::where($provFilter)->get();
            $countOfRecordSatpen = Satpen::whereIn('status', ['setujui', 'expired', 'perpanjangan'])->where(request()->specificFilter)->count("id_satpen");

            $countOfPropinsi = $recordPerPropinsi = $countPerStatus = null;

            if (!in_array(auth()->user()->role, ["admin wilayah", "admin cabang"])) {
                $countOfKabupaten = Kabupaten::count("id_kab");
                $countOfPropinsi = Provinsi::count("id_prov");
                $recordPerPropinsi = DB::select("SELECT id_prov, nm_prov,
                                                        (SELECT COUNT(id_prov) FROM satpen WHERE id_prov=provinsi.id_prov) AS record_count
                                                         FROM provinsi");

                $countPerStatus = DB::select("SELECT (SELECT COUNT(id_satpen) FROM satpen WHERE status='permohonan') AS permohonan,
                                                                (SELECT COUNT(id_satpen) FROM satpen WHERE status='revisi') AS revisi,
                                                                (SELECT COUNT(id_satpen) FROM satpen WHERE status='proses dokumen') AS proses_dokumen,
                                                                (SELECT COUNT(id_satpen) FROM satpen WHERE status='expired') AS expired,
                                                                (SELECT COUNT(id_satpen) FROM satpen WHERE status='perpanjangan') AS perpanjangan ");
            } else {
                $countOfKabupaten = PengurusCabang::where(request()->specificFilter)->count("id_pc");
            }

            return view('admin.home.dashboard', compact("listProvinsi", "countOfKabupaten",
                "countOfPropinsi", "countOfRecordSatpen",
                            "recordPerPropinsi", "countPerStatus"));

        } catch (\Exception $e) {
            throw new CatchErrorException("[DASHBOARD PAGE] has error ". $e);

        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|void
     */

    public function getAllSatpenOrFilter(Request $request)
    {
        $paginatePerPage = Settings::get("count_perpage");
        $selectedColumns = ['id_satpen', 'id_kategori', 'id_kab', 'id_prov', 'id_jenjang', 'npsn', 'no_registrasi', 'nm_satpen', 'yayasan', 'thn_berdiri', 'status', 'tgl_registrasi', 'actived_date'];
        try {
            /**
             * If request without satpenid show all satpen where status 'setujui'
             */
            $statuses = ['setujui', 'expired', 'perpanjangan'];
            if ($request->jenjang
                    || $request->kabupaten
                    || $request->provinsi
                    || $request->kategori || $request->keyword || $request->status) {

                $filter = [];
                if ($request->jenjang) $filter["id_jenjang"] = $request->jenjang;
                if ($request->kabupaten) $filter["id_kab"] = $request->kabupaten;
                if ($request->provinsi) $filter["id_prov"] = $request->provinsi;
                if ($request->kategori) $filter["id_kategori"] = $request->kategori;
                if ($request->status) $statuses = [$request->status];
                if ($request->keyword) array_push($filter, ["nm_satpen", "like", "%". $request->keyword ."%"]);

                if ($filter || $statuses) {
                    $satpenProfile = Satpen::with([
                        'kategori:id_kategori,nm_kategori',
                        'provinsi:id_prov,nm_prov',
                        'kabupaten:id_kab,nama_kab',
                        'jenjang:id_jenjang,nm_jenjang',])
                        ->select($selectedColumns)
                        ->whereIn('status', $statuses)
                        ->where(request()->specificFilter)
                        ->where($filter)
                        ->get();
//                        ->paginate($paginatePerPage);
                }
            }
            else {
                $satpenProfile = Satpen::with([
                    'kategori:id_kategori,nm_kategori',
                    'provinsi:id_prov,nm_prov',
                    'kabupaten:id_kab,nama_kab',
                    'jenjang:id_jenjang,nm_jenjang',])
                    ->select($selectedColumns)
                    ->whereIn('status', $statuses)
                    ->where(request()->specificFilter)
                    ->get();
//                    ->paginate($paginatePerPage);
            }

            /**
             * If satpen profile null is user access satpen id not releate with user id
             */
            if (!$satpenProfile) return redirect()->back()->with('error', 'Forbidden to access satpen profile');

            $propinsi = Provinsi::all();
            $jenjang = Jenjang::all();
            $kategori = Kategori::all();

            return view('admin.satpen.rekapsatpen', compact('satpenProfile',
                'propinsi', 'jenjang', 'kategori'));

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET ALL SATPEN OR FILTER] has error ". $e);

        }
    }

    public function getSatpenById(string $satpenId=null) {
        try {
            if ($satpenId) {
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'timeline', 'filereg'])
                    ->where('id_satpen', '=', $satpenId)
                    ->where(request()->specificFilter)
                    ->first();
                if (!$satpenProfile) return redirect()->back()->with('error', 'Forbidden to access satpen profile');

                return view('admin.satpen.detailSatpen', compact('satpenProfile'));

            }
        } catch (\Exception $e) {
            throw new CatchErrorException("[GET SATPEN BY ID] has error ". $e);

        }
    }

    public function permohonanRegisterSatpen() {
        try {
            $selectedColumns = ['id_satpen', 'id_kategori', 'id_kab', 'id_prov', 'id_jenjang', 'npsn', 'no_registrasi', 'nm_satpen', 'yayasan', 'status'];
            $relationTable = [
                'kategori:id_kategori,nm_kategori',
                'provinsi:id_prov,nm_prov',
                'kabupaten:id_kab,nama_kab',
                'jenjang:id_jenjang,nm_jenjang',
            ];

            $permohonanSatpens = Satpen::with($relationTable)->where('status', '=', 'permohonan')->get($selectedColumns);
            $revisiSatpens = Satpen::with($relationTable)->where('status', '=', 'revisi')->get(array_merge($selectedColumns, ['kecamatan']));
            $prosesDocuments = Satpen::with($relationTable)->where('status', '=', 'proses dokumen')->get(array_merge($selectedColumns, ['kecamatan']));
            $perpanjanganDocuments = Satpen::with($relationTable)->where('status', '=', 'perpanjangan')->get(array_merge($selectedColumns, ['kecamatan']));

            return view('admin.satpen.registersatpen', compact('permohonanSatpens', 'revisiSatpens', 'prosesDocuments', 'perpanjanganDocuments'));

        } catch (\Exception $e) {
            throw new CatchErrorException("[PERMOHONAN REGISTER SATPEN] has error ". $e);

        }
    }

    public function updateSatpenStatus(StatusSatpenRequest $request, Satpen $satpen)
    {
        try {
            if ($satpen->status == $request->status_verifikasi) return redirect()->back()->with('error', 'status satpen sudah sudah sesuai');

            $satpen->update([
                'status' => $request->status_verifikasi
            ]);

            Timeline::create([
                'id_satpen' => $satpen->id_satpen,
                'status_verifikasi' => $request->status_verifikasi,
                'tgl_status' => Date::now(),
                'keterangan' => $request->keterangan,
            ]);

//            Mail::to($satpen->email)->send(new StatusMail($request->status_verifikasi));

            return redirect()->back()->with('success', 'Status satpen telah diupdate menjadi '. $request->status_verifikasi);

        } catch (\Exception $e) {
            throw new CatchErrorException("[UPDATE SATPEN STATUS] has error ". $e);

        }
    }

    public function generatePiagamAndSK(Request $request) {
        try {
            $piagamFilename = Settings::get("prefix_piagam_name");
            $skFilename = Settings::get("prefix_sk_name");
            /**
             * get selected satpen
             */
            $satpen = Satpen::find($request->satpenid);

            if ($satpen) {
                /**
                 * create file data in db.file_upload
                 */
                $piagamFilename .= $satpen->nm_satpen.".pdf";
//                $piagamFilename .= $satpen->nm_satpen.".docx";
                $skFilename .= $satpen->nm_satpen.".pdf";
//                $skFilename .= $satpen->nm_satpen.".docx";
                //create piagam
                FileUpload::create([
                    'id_satpen' => $satpen->id_satpen,
                    'typefile' => "piagam",
                    'qrcode' => GenerateQr::encodeQr(),
                    'nm_file' => $piagamFilename,
                    'tgl_file' => $request->tgl_doc,
                ]);
                FileUpload::create([
                    'id_satpen' => $satpen->id_satpen,
                    'typefile' => "sk",
                    'qrcode' => GenerateQr::encodeQr(),
                    'nm_file' => $skFilename,
                    'tgl_file' => $request->tgl_doc,
                ]);

                /**
                 * get relation data
                 */
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'filereg', 'file'])
                    ->where('id_satpen', '=', $satpen->id_satpen)
                    ->first();

                /**
                 * Create pdf document and save in server
                 */
                ExportDocument::makePiagamDokumen($satpenProfile);
                ExportDocument::makeSKDokumen($satpenProfile);

                /**
                 * update status satpen menjadi disetujui
                 */
                $satpen->update([
                    'actived_date' => Date::now(),
                ]);

                $this->updateSatpenStatus((new StatusSatpenRequest())
                    ->merge(["status_verifikasi" => "setujui"]),
                    $satpen);

                return redirect()->back()->with('success', 'Dokumen Surat Keputusan dan Piagam telah generate');
            }

            return redirect()->back()->with('error', 'satpen tidak ditemukan!');

        } catch (\Exception $e) {
            throw new CatchErrorException("[GENERATE PIAGAM AND SK] has error ". $e);

        }
    }

    public function reGeneratePiagamAndSK(Request $request) {
        try {
            $piagamFilename = Settings::get("prefix_piagam_name");
            $skFilename = Settings::get("prefix_sk_name");
            /**
             * get selected satpen
             */
            $satpen = Satpen::find($request->satpenid);

            if ($satpen) {
                /**
                 * create file data in db.file_upload
                 */
                $piagamFilename .= $satpen->nm_satpen.".pdf";
//                $piagamFilename .= $satpen->nm_satpen.".docx";
                $skFilename .= $satpen->nm_satpen.".pdf";
//                $skFilename .= $satpen->nm_satpen.".docx";
                //create piagam
                FileUpload::where([
                    'id_satpen' => $satpen->id_satpen,
                    'typefile' => "piagam",
                ])->update([
//                    'qrcode' => GenerateQr::encodeQr(),
                    'nm_file' => $piagamFilename,
                    'tgl_file' => $request->tgl_doc,
                ]);
                FileUpload::where([
                    'id_satpen' => $satpen->id_satpen,
                    'typefile' => "sk",
                ])->update([
//                    'qrcode' => GenerateQr::encodeQr(),
                    'nm_file' => $skFilename,
                    'tgl_file' => $request->tgl_doc,
                ]);

                /**
                 * get relation data
                 */
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'filereg', 'file'])
                    ->where('id_satpen', '=', $satpen->id_satpen)
                    ->first();

                /**
                 * Create pdf document and save in server
                 */
                ExportDocument::makePiagamDokumen($satpenProfile);
                ExportDocument::makeSKDokumen($satpenProfile);

                /**
                 * update status satpen menjadi disetujui
                 */
                $satpen->update([
                    'actived_date' => Date::now(),
                ]);

                $this->updateSatpenStatus((new StatusSatpenRequest())
                    ->merge(["status_verifikasi" => "setujui"]),
                    $satpen);

                return redirect()->back()->with('success', 'Dokumen Surat Keputusan dan Piagam telah regenerate');
            }

            return redirect()->back()->with('error', 'satpen tidak ditemukan!');

        } catch (\Exception $e) {
            throw new CatchErrorException("[REGENERATE PIAGAM AND SK] has error ". $e);

        }
    }

    public function destroySatpen(Satpen $satpen) {
        try {
            $fileRegister = FileRegister::where('id_satpen', '=', $satpen->id_satpen);
            foreach ($fileRegister->get() as $file) {
                Storage::disk('uploads')->delete($file->filesurat);
            }
            $fileRegister->delete();
            $fileUploads = FileUpload::where('id_satpen', '=', $satpen->id_satpen);
            foreach ($fileUploads->get() as $file) {
                Storage::delete("generated/".strtolower($file->typefile)."/".$file->nm_file);
            }
            $fileUploads->delete();
            User::find($satpen->id_user)->delete();

            return redirect()->back()->with('success', 'Berhasil menghapus satpen');

        } catch (\Exception $e) {
            throw new CatchErrorException("[DESTROY SATPEN] has error ". $e);

        }

    }

    public function underConstruction() {
        return view('template.constructionad');
    }

}
