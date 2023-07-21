<?php

namespace App\Http\Controllers;

use App\Exceptions\CatchErrorException;
use App\Models\FileUpload;
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

    public function verifyDokumenPage($qrcode = null) {
        try {
            if ($qrcode) {
                $verifyData = FileUpload::where("qrcode", "=", request()->url())->first();
                if (!$verifyData) {
                    return view('landing.resultverify', compact('verifyData'));
                }
                $satpenData = Satpen::find($verifyData->id_satpen);
                return view('landing.resultverify', compact('verifyData', 'satpenData'));
            }
            return view('landing.verify');

        } catch (\Exception $e) {
            throw new CatchErrorException("[VERIFY DOCUMENT PAGE] has error ". $e);
        }
    }

    public function readInformasiPage($slug = null) {
            try {
                $berandaInformasi = Informasi::orderBy('id_info')->limit(5)->get();
                if ($slug) {
                    $readInfo = Informasi::where('slug', '=', $slug)->first();
                    return view('landing.informasi', compact('berandaInformasi', 'readInfo'));
                }
                return view('landing.informasi', compact('berandaInformasi'));

            } catch (\Exception $e) {
                throw new CatchErrorException("[READ INFORMASI PAGE] has error ". $e);
            }
    }
}
