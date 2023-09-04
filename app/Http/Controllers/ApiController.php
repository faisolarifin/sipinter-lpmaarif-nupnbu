<?php

namespace App\Http\Controllers;

use App\Exceptions\CatchErrorException;
use App\Helpers\ReferensiKemdikbud;
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
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'filereg', 'timeline' => function($query){
                        $query->skip($query->count("*") - 7)->limit(7);
                    }])
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
            $additionQuery = " ";
            if (in_array(@auth()->user()->role, ["admin wilayah", "admin cabang"])) {
                $provId = auth()->user()->provId;
                $additionQuery .= "WHERE id_prov='$provId'";
            }
            $recordPerPropinsi = DB::select("SELECT nm_prov, map,
                                                        (SELECT COUNT(id_prov) FROM satpen WHERE id_prov=provinsi.id_prov and status IN ('setujui','expired','perpanjangan')) AS record_count
                                                         FROM provinsi $additionQuery");
            if (!$recordPerPropinsi) return response()->json(['error' => 'Forbidden to access record']);

            return response()->json($recordPerPropinsi, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET PROV AND COUNT] has error ". $e);

        }

    }

    public function getKabAndCount(int $provId=null) {
        try {
            if (!$provId) $provId = Provinsi::min("id_prov");
            $recordPerKabupaten = DB::select("SELECT nama_kab, (SELECT COUNT(id_kab) FROM satpen WHERE id_kab=kabupaten.id_kab and status IN ('setujui','expired','perpanjangan')) AS record_count FROM kabupaten WHERE id_prov='$provId'");

            if (!$recordPerKabupaten) return response()->json(['error' => 'Forbidden to access record']);

            return response()->json($recordPerKabupaten, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET KAB AND COUNT] has error ". $e);

        }
    }

    public function getPCAndCount() {
        try {
            $additionQuery = " ";
            if (in_array(auth()->user()->role, ["admin cabang"])) {
                $pcId = auth()->user()->cabangId;
                $additionQuery .= "WHERE id_pc='$pcId'";
            } elseif (in_array(auth()->user()->role, ["admin wilayah"])) {
                $provId = auth()->user()->provId;
                $additionQuery .= "WHERE id_prov='$provId'";
            }

            $recordPerKabupaten = DB::select("SELECT nama_pc, (SELECT COUNT(id_pc) FROM satpen WHERE id_pc=pengurus_cabang.id_pc and status IN ('setujui','expired','perpanjangan')) AS record_count FROM pengurus_cabang $additionQuery");

            if (!$recordPerKabupaten) return response()->json(['error' => 'Forbidden to access record']);

            return response()->json($recordPerKabupaten, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET PC AND COUNT] has error ". $e);

        }
    }

    public function getJenjangAndCount() {
        try {
            $additionQuery = " ";
            if (in_array(auth()->user()->role, ["admin wilayah"])) {
                $provId = auth()->user()->provId;
                $additionQuery .= "AND id_prov='$provId'";
            }
            elseif (in_array(auth()->user()->role, ["admin cabang"])) {
                $pcId = auth()->user()->cabangId;
                $additionQuery .= "AND id_pc='$pcId'";
            }
            $recordByJenjang = DB::select("SELECT nm_jenjang, keterangan, (SELECT COUNT(id_jenjang) FROM satpen WHERE id_jenjang=jenjang_pendidikan.id_jenjang and status IN ('setujui','expired','perpanjangan') $additionQuery ) AS record_count FROM jenjang_pendidikan");
            if (!$recordByJenjang) return response()->json(['error' => 'Forbidden to access record']);

            return response()->json($recordByJenjang, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            throw new CatchErrorException("[GET JENJANG AND COUNT] has error ". $e);

        }
    }

    public function checkNPSNtoReferensiData(string $npsn=null) {
        try {
            if ($npsn) {
                $cloneSekolah = new ReferensiKemdikbud();
                $cloneSekolah->clone($npsn);

                if ($cloneSekolah->getStatus() && $cloneSekolah->getResult() !== null) {
                    $jsonResultSekolah = $cloneSekolah->getResult();
                    return response()->json($jsonResultSekolah, HttpResponse::HTTP_OK);
                }
                return response()->json(['error' => $cloneSekolah->getResult()]);
            }
        } catch (\Exception $e) {
            throw new CatchErrorException("[GET SATPEN BY ID] has error ". $e);

        }
    }

}
