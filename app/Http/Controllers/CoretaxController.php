<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoretaxRequest;
use App\Models\Coretax;
use App\Models\CoretaxStatus;
use Carbon\Carbon;

class CoretaxController extends Controller
{
    public function index() {
        $coretax = Coretax::with(["satpen:id_satpen,id_user,no_registrasi,nm_satpen", "corestatus", "wilayah"])
            ->where('id_user', '=', auth()->user()->id_user)
            ->orderBy('id', 'DESC')
            ->first();

        $notice=null;
        if ($coretax) {
            $notice = CoretaxStatus::where([
                'id_coretax' => $coretax->id,
                'statusType' => $coretax->status,
            ])->first();
        }
        return view('coretax.pengajuan', compact('coretax', 'notice'));
    }

    public function new() {
        $data = [
            'id_user' => auth()->user()->id_user,
            'id_pw' => null,
            'id_pc' => null,
            'tanggal' => Carbon::now(),
            'tgl_submit' => null,
            'status' => 'mengisi persyaratan',
        ];

        if (auth()->user()->provId && auth()->user()->cabangId) {
            $data['id_pc'] = auth()->user()->cabangId;
        } elseif (auth()->user()->provId) {
            $data['id_pw'] = auth()->user()->provId;
        }

        $coretax = Coretax::create($data);
        CoretaxStatus::insert([
           [
               'id_coretax' => $coretax->id,
               'statusType' => 'mengisi persyaratan',
               'icon' => 'ti-keyboard',
               'textstatus' => 'Mengisi Persyaratan',
               'status' => 'success',
           ],[
               'id_coretax' => $coretax->id,
               'statusType' => 'verifikasi',
               'icon' => 'ti-building-bank',
               'textstatus' => 'Verifikasi',
               'status' => null,
           ],[
               'id_coretax' => $coretax->id,
               'statusType' => 'perbaikan',
               'icon' => 'ti-checkup-list',
               'textstatus' => 'Diterima Verifikator',
               'status' => null,
           ],[
               'id_coretax' => $coretax->id,
               'statusType' => 'dokumen diproses',
               'icon' => 'ti-manual-gearbox',
               'textstatus' => 'Sedang Diproses',
               'status' => null,
           ],[
               'id_coretax' => $coretax->id,
               'statusType' => 'final aprove',
               'icon' => 'ti-fingerprint',
               'textstatus' => 'Final Aprove',
               'status' => null,
           ],
        ]);

        return redirect()->back();

    }

    public function stored(CoretaxRequest $request, Coretax $coretax) {

        $coretax->update([
            'nitku' => $request->nitku,
            'nama_pic' => $request->nm_pic,
            'nik_pic' => $request->nik_pic,
            'whatsapp_pic' => $request->whatsapp_pic,
            'tgl_submit' => Carbon::now(),
            'status' => 'verifikasi',
        ]);

        CoretaxStatus::where([
            'id_coretax' => $coretax->id,
            'statusType' => 'verifikasi',
        ])->update([
            'status' => 'success',
        ]);

        CoretaxStatus::where([
            'id_coretax' => $coretax->id,
            'statusType' => 'perbaikan',
        ])->update([
            'status' => null,
            'keterangan' => null,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengajukan permohonan layanan Coretax');
    }

    public function history() {
        $coretax = Coretax::with(["corestatus"])
        ->where('id_user', '=', auth()->user()->id_user)
        ->where('status', '=', 'final aprove')
        ->orderBy('id', 'DESC')
        ->get();

        return view('coretax.riwayat', compact('coretax'));
    }

    public function forbidden() {
        return view('coretax.forbidden');
    }
}
