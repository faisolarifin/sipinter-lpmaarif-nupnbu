<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class PropinsiController extends Controller
{
    public function index() {

        $listPropinsi = Provinsi::get();
        return view('admin.master.datapropinsi', compact('listPropinsi'));
    }

    public function store(Request $request) {
        try {
            Provinsi::create([
                'kode_prov' => $request->kode_prov,
                'kode_prov_kd' => $request->kode_prov_kd,
                'nm_prov' => $request->nama_prov,
            ]);

            return redirect()->route('propinsi.index')->with('success', 'Berhasil membuat propinsi');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function show(Provinsi $propinsi) {
        try {
            return response()->json($propinsi, HttpResponse::HTTP_OK);

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function update(Request $request, Provinsi $propinsi) {
        try {
            $propinsi->update([
                'kode_prov' => $request->kode_prov,
                'kode_prov_kd' => $request->kode_prov_kd,
                'nm_prov' => $request->nama_prov,
            ]);

            return redirect()->route('propinsi.index')->with('success', 'Berhasil update propinsi');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function destroy(Provinsi $propinsi) {
        try {
            $propinsi->delete();

            return redirect()->route('propinsi.index')->with('success', 'Berhasil menghapus propinsi');

        } catch (\Exception $e) {
            dd($e);
        }
    }
}
