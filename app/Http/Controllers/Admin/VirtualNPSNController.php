<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\CatchErrorException;
use App\Helpers\MailService;
use App\Http\Controllers\Controller;
use App\Models\VirtualNPSN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class VirtualNPSNController extends Controller
{
    public function listPermohonanVNPSN() {

        $VNpsnReqs = VirtualNPSN::with(
                    ["jenjang:id_jenjang,nm_jenjang",
                    "provinsi:id_prov,nm_prov",
                    "kabupaten:id_kab,nama_kab"])
                    ->where('nomor_virtual', '=', null)
                    ->orderBy('id_npsn', 'DESC') ->get();

        $VNpsnAccepts = VirtualNPSN::with(["jenjang:id_jenjang,nm_jenjang",
                    "provinsi:id_prov,nm_prov",
                    "kabupaten:id_kab,nama_kab"])
                    ->where('nomor_virtual', '!=', null)
                    ->orderBy('id_npsn', 'DESC') ->get();

        return view('admin.satpen.virtualnpsn', compact('VNpsnReqs', 'VNpsnAccepts'));
    }

    public function generateVirtualNumber(VirtualNPSN $virtualNPSN) {
        try {
            if ($virtualNPSN) {
                $orderedNum = 0;
//                $prefProv = str_pad($virtualNPSN->id_prov, 2, '0', STR_PAD_LEFT);
//                $prefJj = str_pad($virtualNPSN->id_jenjang, 2, '0', STR_PAD_LEFT);
                $maxVNPSN = VirtualNPSN::max('nomor_virtual');
                if ($maxVNPSN) {
                    $orderedNum = (int) substr($maxVNPSN, strlen($maxVNPSN) - 4);
                }
                $orderedNum = str_pad(++$orderedNum, 8, '0', STR_PAD_LEFT);
//                $new_VNPSN = $prefProv.$prefJj.$orderedNum;
                $new_VNPSN = $orderedNum;

                //save
                $virtualNPSN->update([
                    'nomor_virtual' => $new_VNPSN,
                ]);
                $link_check_npsn = url("ceknpsn");
                //send email
                MailService::send([
                    "to" => $virtualNPSN->email,
                    "subject" => "Virtual NPSN",
                    "recipient" => $virtualNPSN->nama_sekolah,
                    "content" => "<p>Permintaan NPSN Virtual telah disetujui oleh admin, berikut kode VNPSN yang dapat anda gunakan:</p>
                                    <h2>$new_VNPSN</h2>
                                    <a href='$link_check_npsn' class='cta-button'>Lakukan Pendaftaran</a>"
                ]);

                return redirect()->back()->with('success', 'Berhasil membuat Nomor NPSN Virtual');
            }
            return redirect()->back()->with('error', 'Invalid VNPSN Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function rejectPermohonanVNPSN( VirtualNPSN $virtualNPSN, Request $request) {
        try {
            if ($virtualNPSN) {
                //send email
                MailService::send([
                    "to" => $virtualNPSN->email,
                    "subject" => "Penolakan Virtual NPSN",
                    "recipient" => $virtualNPSN->nama_sekolah,
                    "content" => "<p>Permintaan NPSN Virtual ditolak oleh admin, dengan alasan :</p> <p><strong>$request->alasan</strong></i></p>"
                ]);

                $virtualNPSN->delete();
                return redirect()->back()->with('success', 'Permintaan VNPSN telah ditolak');
            }
            return redirect()->back()->with('error', 'Invalid VNPSN Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function destroyVNPSN(VirtualNPSN $virtualNPSN) {
        try {
            if ($virtualNPSN) {
                $virtualNPSN->delete();
                return redirect()->back()->with('success', 'Berhasil menghapus Nomor NPSN Virtual');
            }
            return redirect()->back()->with('error', 'Invalid VNPSN Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }
}
