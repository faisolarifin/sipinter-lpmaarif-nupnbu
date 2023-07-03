<?php

namespace App\Http\Controllers;

use App\Helpers\Date;
use App\Models\Jenjang;
use App\Models\Kabupaten;
use App\Models\PengurusCabang;
use App\Models\Provinsi;
use App\Models\Satpen;

class OperatorController extends Controller
{
    public function dashboardPage() {
        return view('myprofile.profile');
    }
    public function mySatpenPage() {
        try {
            $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'timeline'])
                ->where('id_user', '=', auth()->user()->id_user)
                ->first();

            return view('satpen.satpen', compact('satpenProfile'));

        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function editSatpenPage() {
        try {
            $satpenProfile = Satpen::where('id_user', '=', auth()->user()->id_user)->first();

            if ($satpenProfile->status != 'revisi') return redirect()->back()
                ->with('error', 'Status satpen bukan dalam masa revisi');

            $kabupaten = Kabupaten::where('id_prov', '=', $satpenProfile->id_prov)
                ->orderBy('id_kab')->get();
            $cabang = PengurusCabang::where('id_prov', '=', $satpenProfile->id_prov)
                ->orderBy('id_pc')->get();
            $propinsi = Provinsi::orderBy('id_prov')->get();
            $jenjang = Jenjang::orderBy('id_jenjang')->get();

            return view('satpen.revisi', compact('satpenProfile', 'jenjang', 'propinsi', 'kabupaten', 'cabang'));

        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function perpanjangSatpenPage() {
        try {
            $satpenProfile = Satpen::where('id_user', '=', auth()->user()->id_user)->first();

            if ($satpenProfile->status != 'expired') return redirect()->back()
                ->with('error', 'Status dokumen satpen belum expired');

            $kabupaten = Kabupaten::where('id_prov', '=', $satpenProfile->id_prov)
                ->orderBy('id_kab')->get();
            $cabang = PengurusCabang::where('id_prov', '=', $satpenProfile->id_prov)
                ->orderBy('id_pc')->get();
            $propinsi = Provinsi::orderBy('id_prov')->get();
            $jenjang = Jenjang::orderBy('id_jenjang')->get();

            return view('satpen.perpanjang', compact('satpenProfile', 'jenjang', 'propinsi', 'kabupaten', 'cabang'));

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function underConstruction() {
        return view('template.construction');
    }


}
