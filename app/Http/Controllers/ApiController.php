<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Satpen;
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
            dd($e);
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
            dd($e);
        }
    }
}
