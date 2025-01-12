<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\CatchErrorException;
use App\Http\Controllers\Controller;
use App\Models\OSS;
use App\Models\OSSStatus;
use App\Models\OSSTimeline;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OSSController extends Controller
{
    public function listPermohonanOSS() {

        $specificFilter = request()->specificFilter;

        $ossVerifikasi = OSS::with(["satpen:id_satpen,id_user,no_registrasi,nm_satpen"])->whereIn('status', ['verifikasi','perbaikan'])
            ->whereHas('satpen', function($query) use ($specificFilter) {
                $query->where($specificFilter);
            })->orderBy('id_oss', 'DESC') ->get();

        $ossProses = OSS::with(["satpen:id_satpen,id_user,no_registrasi,nm_satpen"])->where('status', '=', 'dokumen diproses')
            ->whereHas('satpen', function($query) use ($specificFilter) {
                $query->where($specificFilter);
            })->orderBy('id_oss', 'DESC')->get();

        $ossTerbit = OSS::with(["satpen:id_satpen,id_user,no_registrasi,nm_satpen"])->where('status', '=', 'izin terbit')
            ->whereHas('satpen', function($query) use ($specificFilter) {
                $query->where($specificFilter);
            })->orderBy('id_oss', 'DESC')->get();

        return view('admin.oss.oss', compact('ossVerifikasi', 'ossProses', 'ossTerbit'));
    }

    public function detailOSSQuesioner(string $ossId) {
        $specificFilter = request()->specificFilter;

        $oss = OSS::with(["satpen:id_satpen,id_user,no_registrasi,nm_satpen"])->where('id_oss', '=', $ossId)
            ->whereHas('satpen', function($query) use ($specificFilter) {
                $query->where($specificFilter);
            })->orderBy('id_oss', 'DESC') ->first();

        return view('admin.oss.oss-detail', compact('oss'));
    }

    public function setAcceptOSS(Request $request, OSS $oss) {

        try {
            if ($oss) {
                $oss->update([
                    'status' => 'dokumen diproses',
                ]);
                OSSStatus::where([
                    'id_oss' => $oss->id_oss,
                    'statusType' => 'perbaikan',
                ])->update([
                    'textstatus' => 'Diterima Verifikator',
                    'status' => 'success',
                ]);
                OSSStatus::where([
                    'id_oss' => $oss->id_oss,
                    'statusType' => 'dokumen diproses',
                ])->update([
                    'status' => 'success',
                    'keterangan' => null,
                ]);

                OSSTimeline::create([
                    'id_oss' => $oss->id_oss,
                    'status_verifikasi' => 'dokumen diproses',
                    'tgl_verifikasi' => Carbon::now(),
                    'catatan' => $request->catatan,
                    'link_pnbr' => $request->link_pnbr,
                    'link_catatan_pupr' => $request->link_catatan_pupr,
                    'link_kode_ajuan' => $request->link_kode_ajuan,
                    'nomor_ku' => $request->nomor_ku,
                ]);

                return redirect()->back()->with('success', 'Berhasil menerima permohonan');
            }
            return redirect()->back()->with('error', 'Invalid OSS Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function setRejectOSS(Request $request, OSS $oss) {

        try {
            if ($oss) {
                $oss->update([
                    'status' => 'perbaikan',
                ]);
                OSSStatus::where([
                    'id_oss' => $oss->id_oss,
                    'statusType' => 'perbaikan',
                ])->update([
                    'textstatus' => 'Ditolak Verifikator',
                    'status' => 'failed',
                    'keterangan' => $request->keterangan,
                ]);
                OSSStatus::where([
                    'id_oss' => $oss->id_oss,
                    'statusType' => 'dokumen diproses',
                ])->update([
                    'status' => null,
                    'keterangan' => null
                ]);

                OSSTimeline::create([
                    'id_oss' => $oss->id_oss,
                    'status_verifikasi' => 'perbaikan',
                    'tgl_verifikasi' => Carbon::now(),
                    'catatan' => $request->catatan,
                    'link_pnbr' => $request->link_pnbr,
                    'link_catatan_pupr' => $request->link_catatan_pupr,
                    'link_kode_ajuan' => $request->link_kode_ajuan,
                    'nomor_ku' => $request->nomor_ku,
                ]);

                return redirect()->back()->with('success', 'Permohonan oss ditolak');
            }
            return redirect()->back()->with('error', 'Invalid OSS Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function setIzinTerbitOSS(Request $request, OSS $oss) {

        try {
            if ($oss) {
                $oss->update([
                    'tgl_izin' => Carbon::now(),
                    'tgl_expired' => $request->tgl_expired,
                    'status' => 'izin terbit',
                ]);
                OSSStatus::where([
                    'id_oss' => $oss->id_oss,
                    'statusType' => 'izin terbit',
                ])->update([
                    'status' => 'success',
                    'keterangan' => null,
                ]);

                OSSTimeline::create([
                    'id_oss' => $oss->id_oss,
                    'status_verifikasi' => 'izin terbit',
                    'tgl_verifikasi' => Carbon::now(),
                    'catatan' => $request->catatan,
                    'link_pnbr' => $request->link_pnbr,
                    'link_catatan_pupr' => $request->link_catatan_pupr,
                    'link_kode_ajuan' => $request->link_kode_ajuan,
                    'nomor_ku' => $request->nomor_ku,
                ]);

                return redirect()->back()->with('success', 'Berhasil menerbitkan izin oss');
            }
            return redirect()->back()->with('error', 'Invalid OSS Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function destroyOSS(OSS $oss) {
        try {
            if ($oss) {
                $oss->delete();
                return redirect()->back()->with('success', 'Berhasil menghapus izin OSS');
            }
            return redirect()->back()->with('error', 'Invalid OSS Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }
}
