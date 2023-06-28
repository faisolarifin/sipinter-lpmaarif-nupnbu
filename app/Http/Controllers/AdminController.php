<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\Provinsi;
use App\Models\Satpen;
use App\Models\Jenjang;
use App\Models\Timeline;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\StatusSatpenRequest;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboardPage() {
        return view('admin.home.dashboard');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|void
     */

    public function getAllSatpenOrFilter(Request $request)
    {
        $paginatePerPage = 10;
        $selectedColumns = ['id_satpen', 'id_kategori', 'id_kab', 'id_prov', 'id_jenjang', 'no_registrasi', 'nm_satpen', 'yayasan', 'thn_berdiri', 'status'];
        try {
            /**
             * If request without satpenid show all satpen where status 'terima'
             */
            if ($request->jenjang
                    || $request->kabupaten
                    || $request->provinsi
                    || $request->kategori) {

                $filter = [];
                if ($request->jenjang) $filter["id_jenjang"] = $request->jenjang;
                if ($request->kabupaten) $filter["id_kab"] = $request->kabupaten;
                if ($request->provinsi) $filter["id_prov"] = $request->provinsi;
                if ($request->kategori) $filter["id_kategori"] = $request->kategori;
//                if ($request->yayasan) $filter["yayasan"] = $request->yayasan;
//                if ($request->satpen) array_push($filter, ["nm_satpen", "like", "%". $request->satpen ."%"]);

                if ($filter) {
                    $satpenProfile = Satpen::with([
                        'kategori:id_kategori,nm_kategori',
                        'provinsi:id_prov,nm_prov',
                        'kabupaten:id_kab,nama_kab',
                        'jenjang:id_jenjang,nm_jenjang',
                    ])
                        ->select($selectedColumns)
                        ->where('status', '=', 'terima')
                        ->where($filter)
                        ->paginate($paginatePerPage);
                }
            }
            else {
                $satpenProfile = Satpen::with([
                    'kategori:id_kategori,nm_kategori',
                    'provinsi:id_prov,nm_prov',
                    'kabupaten:id_kab,nama_kab',
                    'jenjang:id_jenjang,nm_jenjang',
                ])
                    ->select($selectedColumns)
                    ->where('status', '=', 'terima')
                    ->paginate($paginatePerPage);
            }

            /**
             * If satpen profile null is user access satpen id not releate with user id
             */
            if (!$satpenProfile) return redirect()->back()->with('error', 'Forbidden to access satpen profile');

            $propinsi = Provinsi::all();
            $kabupaten = Kabupaten::all();
            $jenjang = Jenjang::all();
            $kategori = Kategori::all();

            return view('admin.satpen.rekapsatpen', compact('satpenProfile',
                'propinsi', 'kabupaten', 'jenjang', 'kategori'));

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function getSatpenById(string $satpenId=null) {
        try {
            if ($satpenId) {
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'timeline'])
                    ->where('id_user', '=', $satpenId)
                    ->first();
                if (!$satpenProfile) return redirect()->back()->with('error', 'Forbidden to access satpen profile');

                return view('admin.satpen.detailSatpen', compact('satpenProfile'));

            }
        } catch (\Exception $e) {
            dd($e);
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
            $prosesDocuments = Satpen::with($relationTable)->where('status', '=', 'proses dokumen')->get($selectedColumns);

            return view('admin.satpen.registersatpen', compact('permohonanSatpens', 'revisiSatpens', 'prosesDocuments'));

        } catch (\Exception $e) {
            dd($e);
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

            return redirect()->route('a.satpen')->with('success', 'Status satpen telah diupdate menjadi '. $request->status_verifikasi);

        } catch (\Exception $e) {
            dd($e);
        }
    }



    public function underConstruction() {
        return view('template.constructionad');
    }


}
