<?php

namespace App\Http\Controllers;

use App\Models\Satpen;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ApiController extends Controller
{
    public function getSatpenById(string $satpenId=null) {
        try {
            if ($satpenId) {
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang', 'timeline'])
                    ->where('id_satpen', '=', $satpenId)
                    ->first();
                if (!$satpenProfile) return redirect()->back()->with('error', 'Forbidden to access satpen profile');

                return response()->json($satpenProfile, HttpResponse::HTTP_OK);

            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
