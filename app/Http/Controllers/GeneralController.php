<?php

namespace App\Http\Controllers;

use App\Exceptions\CatchErrorException;
use App\Helpers\Date;
use App\Models\FileUpload;
use App\Models\Informasi;
use App\Models\Satpen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function verifyDokumenPage($qrcode = null) {
        if ($qrcode) {
            try {
                $verifyData = FileUpload::where("qrcode", "=", request()->url())->first();
                $satpenData = Satpen::find($verifyData->id_satpen);
                return view('landing.resultverify', compact('verifyData', 'satpenData'));

            } catch (\Exception $e) {
                throw new CatchErrorException("[VERIFY DOCUMENT PAGE] has error ". $e);
            }
        }
        return view('landing.verify');
    }

    public function totalSatpenByJenjang($npsn=null) {
//
//        if ($npsn) {
//            $cloneSekolah = new ReferensiKemdikbud();
//            $cloneSekolah->clone($npsn);
//
//            return response($cloneSekolah->getResult());
//        }
//        return response("Invalid npsn");
        return route('verify', str_replace("-", "", Str::uuid()));

    }
}
