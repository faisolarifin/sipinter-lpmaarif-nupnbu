<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Satpen;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function homePage()
    {
        $jmlSatpenByKabupaten = DB::select("SELECT nama_kab, (SELECT COUNT(id_kab) FROM satpen WHERE id_kab=kabupaten.id_kab) AS jml_satpen FROM kabupaten");
        $jmlSatpenByJenjang = DB::select("SELECT id_jenjang, nm_jenjang, keterangan, (SELECT COUNT(id_jenjang) FROM satpen WHERE id_jenjang=jenjang_pendidikan.id_jenjang) AS jml_satpen FROM jenjang_pendidikan");
        $berandaInformasi = Informasi::orderBy('id_info')->limit(5)->get();
        $countSatpen = Satpen::whereIn('status', ['setujui', 'expired'])->count('id_satpen');
        return view('landing.home', compact('jmlSatpenByJenjang', 'jmlSatpenByKabupaten', 'berandaInformasi', 'countSatpen'));
    }

    public function totalSatpenByJenjang() {
//        return response($satpen);
    }
}
