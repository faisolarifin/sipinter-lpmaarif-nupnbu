<?php

namespace App\Http\Controllers;

use App\Http\Requests\OSSRequest;
use App\Models\OSS;
use App\Models\OSSStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class OSSController extends Controller
{
    public function permohonanOSSPage() {

        $oss = OSS::with("ossstatus")
            ->where('id_user', '=', auth()->user()->id_user)
            ->orderBy('id_oss', 'DESC')
            ->first();

        $notice=null;
        if ($oss) {
            $notice = OSSStatus::where([
                'id_oss' => $oss->id_oss,
                'statusType' => $oss->status,
            ])->first();
        }
        return view('oss.permohonan', compact('oss', 'notice'));
    }

    public function permohonanBaruOSS() {

        $oss = OSS::create([
            'id_user' => auth()->user()->id_user,
            'kode_unik' => '',
            'bukti_bayar' => '',
            'tanggal' => Carbon::now(),
            'status' => 'mengisi persyaratan',
        ]);

        OSSStatus::insert([
           [
               'id_oss' => $oss->id_oss,
               'statusType' => 'mengisi persyaratan',
               'icon' => 'ti-keyboard',
               'textstatus' => 'Mengisi Persyaratan',
               'status' => 'success',
           ],[
               'id_oss' => $oss->id_oss,
               'statusType' => 'verifikasi',
               'icon' => 'ti-building-bank',
               'textstatus' => 'Verifikasi',
               'status' => null,
           ],[
               'id_oss' => $oss->id_oss,
               'statusType' => 'perbaikan',
               'icon' => 'ti-checkup-list',
               'textstatus' => 'Diterima Verifikator',
               'status' => null,
           ],[
               'id_oss' => $oss->id_oss,
               'statusType' => 'dokumen diproses',
               'icon' => 'ti-manual-gearbox',
               'textstatus' => 'Sedang Diproses',
               'status' => null,
           ],[
               'id_oss' => $oss->id_oss,
               'statusType' => 'izin terbit',
               'icon' => 'ti-fingerprint',
               'textstatus' => 'Izin Telah Terbit',
               'status' => null,
           ],
        ]);

        return redirect()->back();

    }

    public function storePermohonanOSS(OSSRequest $request, OSS $oss) {

        if ($request->file('bukti_bayar')
            && $request->file('bukti_bayar')->isValid()) {
            $pathBuktiBayar = Storage::disk('buktibayar')->putFile(null, $request->file('bukti_bayar'));
            Storage::disk("buktibayar")->delete($oss->bukti_bayar);
        }

        $oss->update([
            'kode_unik' => $request->kode_unik,
            'bukti_bayar' => $pathBuktiBayar,
            'tanggal' => Carbon::now(),
            'status' => 'verifikasi',
        ]);

        OSSStatus::where([
            'id_oss' => $oss->id_oss,
            'statusType' => 'verifikasi',
        ])->update([
            'status' => 'success',
        ]);

        OSSStatus::where([
            'id_oss' => $oss->id_oss,
            'statusType' => 'perbaikan',
        ])->update([
            'status' => null,
            'keterangan' => null,
        ]);

        return redirect()->back()->with('success', 'Berhasil melakukan permohonan oss');
    }

    public function historyPermohonan() {
        $ossHistory = OSS::with("ossstatus")
            ->where('id_user', '=', auth()->user()->id_user)
            ->where('status', '=', 'izin terbit')
            ->orderBy('id_oss', 'DESC')
            ->get();

        return view('oss.history', compact('ossHistory'));
    }

    public function forbiddenPage() {
        return view('oss.forbidden');
    }
}
