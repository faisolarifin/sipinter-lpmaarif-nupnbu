<?php

namespace App\Http\Controllers;

use App\Exceptions\CatchErrorException;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Satpen;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApiController extends Controller
{
    public function getSatpenById(string $satpenId=null) {
        try {
            if ($satpenId) {
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'timeline', 'filereg'])
                    ->where('id_satpen', '=', $satpenId)
                    ->first();
                if (!$satpenProfile) return response()->json(['error' => 'Forbidden to access satpen profile']);

                return response()->json($satpenProfile, HttpResponse::HTTP_OK);

            }
        } catch (\Exception $e) {
            throw new CatchErrorException("[GET SATPEN BY ID] has error ". $e);

        }
    }

    public function getKabupatenByProv(string $provId=null) {
        try {
            if ($provId) {
                $provs = Kabupaten::where('id_prov', '=', $provId)->get();
                if (!$provs) return response()->json(['error' => 'Forbidden to access kabupaten']);

                return response()->json($provs, HttpResponse::HTTP_OK);

            }
        } catch (\Exception $e) {
            throw new CatchErrorException("[GET KABUPATEN BY PROV] has error ". $e);

        }
    }

    public function getProvAndCount() {
        try {
            $recordPerPropinsi = DB::select("SELECT nm_prov, map,
                                                        (SELECT COUNT(id_prov) FROM satpen WHERE id_prov=provinsi.id_prov and status IN ('setujui','expired')) AS record_count
                                                         FROM provinsi");
            if (!$recordPerPropinsi) return response()->json(['error' => 'Forbidden to access record']);

            return response()->json($recordPerPropinsi, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET PROV AND COUNT] has error ". $e);

        }

    }

    public function getKabAndCount(int $provId=null) {
        try {
            if (!$provId) $provId = Provinsi::min("id_prov");
            $recordPerKabupaten = DB::select("SELECT nama_kab, (SELECT COUNT(id_kab) FROM satpen WHERE id_kab=kabupaten.id_kab and status IN ('setujui','expired')) AS record_count FROM kabupaten WHERE id_prov='$provId'");

            if (!$recordPerKabupaten) return response()->json(['error' => 'Forbidden to access record']);

            return response()->json($recordPerKabupaten, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET KAB AND COUNT] has error ". $e);

        }
    }

    public function getJenjangAndCount() {
        try {
            $recordByJenjang = DB::select("SELECT nm_jenjang, keterangan, (SELECT COUNT(id_jenjang) FROM satpen WHERE id_jenjang=jenjang_pendidikan.id_jenjang and status IN ('setujui','expired')) AS record_count FROM jenjang_pendidikan");
            if (!$recordByJenjang) return response()->json(['error' => 'Forbidden to access record']);

            return response()->json($recordByJenjang, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET JENJANG AND COUNT] has error ". $e);

        }
    }

}
