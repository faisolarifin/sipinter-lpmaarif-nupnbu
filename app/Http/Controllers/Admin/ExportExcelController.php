<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SatpenExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{

    public function exportSatpentoExcel(Request $request)
    {
        $specificFilter = null;
        if (in_array(auth()->user()->role, ["admin wilayah"])) {
            $specificFilter = [
                "id_prov" => auth()->user()->provId,
            ];
        } elseif (in_array(auth()->user()->role, ["admin cabang"])) {
            $specificFilter = [
                "id_pc" => auth()->user()->cabangId,
            ];
        }
        $statuses = ['setujui', 'expired', 'perpanjangan'];
        $filter = [];
        if ($request->jenjang) $filter["id_jenjang"] = $request->jenjang;
        if ($request->kabupaten) $filter["id_kab"] = $request->kabupaten;
        if ($request->provinsi) $filter["id_prov"] = $request->provinsi;
        if ($request->kategori) $filter["id_kategori"] = $request->kategori;
        if ($request->status) $statuses = [$request->status];
        if ($request->keyword) array_push($filter, ["nm_satpen", "like", "%". $request->keyword ."%"]);

        return Excel::download(new SatpenExport($specificFilter, $statuses, $filter), 'exported_data.xlsx');
    }

}
