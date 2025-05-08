<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\CatchErrorException;
use App\Http\Controllers\Controller;
use App\Models\PengurusCabang;
use App\Models\ProfilePengurusCabang;
use App\Models\ProfilePengurusWilayah;
use App\Models\Provinsi;

class ProfileController extends Controller
{
    public function profileCabang() {
        $cabang = PengurusCabang::with(["profile", "prov"])
                    ->orderBy('id_pc', 'DESC')
                    ->whereHas("profile", function ($query) {
                        $query->where('id', '!=', null);
                    })
                    ->get();
        return view('admin.profile.profile-cabang', compact('cabang'));
    }

    public function profileWilayah() {
        $wilayah = Provinsi::with("profile")
            ->orderBy('id_prov', 'DESC')
            ->whereHas("profile", function ($query) {
                $query->where('id', '!=', null);
            })
            ->get();
        return view('admin.profile.profile-wilayah', compact('wilayah'));
    }

    public function profileDetail($ID) {
        if ($ID) {
            if (request()->segment(3) === "cabang") {
                    $data = PengurusCabang::with(["profile", "prov"])
                    ->whereHas("profile", function ($query) {
                        $query->where('id', '!=', null);
                    })
                    ->where("id_pc", $ID)
                    ->first();
                    return view('admin.profile.detail-profile', compact('data'));
            }
            $data = Provinsi::with("profile")
                ->whereHas("profile", function ($query) {
                    $query->where('id', '!=', null);
                })
                ->where("id_prov", $ID)
                ->first();
                return view('admin.profile.detail-profile', compact('data'));
        }
    }

    public function destroyWilayah(ProfilePengurusWilayah $profile) {
        try {
            if ($profile) {
                $profile->delete();
                return redirect()->back()->with('success', 'Berhasil menghapus profile organisasi');
            }
            return redirect()->back()->with('error', 'Invalid Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function destroyCabang(ProfilePengurusCabang $profile) {
        try {
            if ($profile) {
                $profile->delete();
                return redirect()->back()->with('success', 'Berhasil menghapus profile organisasi');
            }
            return redirect()->back()->with('error', 'Invalid Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }


}
