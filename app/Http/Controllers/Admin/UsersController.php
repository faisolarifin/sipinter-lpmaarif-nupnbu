<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\CatchErrorException;
use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {

        $provList = Provinsi::all();
        $usersAdmin = User::with(["wilayah", "cabang"])->whereIn("role", ["admin", "super admin", "admin pusat", "admin wilayah", "admin cabang"])
                            ->get();

        return view('admin.users.users', compact('usersAdmin', 'provList'));

    }

    public function store(Request $request) {

        $request->validate([
           'name' => 'required',
           'username' => 'required|unique:users,username',
           'password' => 'required',
           'role' => 'required|in:super admin,admin pusat,admin wilayah,admin cabang',
        ]);

        try {
            User::create([
               'name' => $request->name,
               'username' => $request->username,
               'password' => Hash::make($request->password),
               'role' => $request->role,
               'provId' => $request->kode_prov,
               'cabangId' => $request->kode_pc,
            ]);

            return redirect()->back()->with('success', 'Berhasil membuat akun administrator');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function show(User $user) {
        try {
            if ($user) {
                return response()->json($user);
            }
            return response()->json(['error' => 'Invalid User Id']);

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function update(Request $request, User $user) {

        $request-> validate([
            'role' => 'in:super admin,admin pusat,admin wilayah,admin cabang',
            'status' => 'in:active,block'
        ]);

        try {
            if ($user) {

                $provId = in_array($request->role, ["admin wilayah", "admin cabang"]) && $request->kode_prov ? $request->kode_prov : "";
                $cabangId = in_array($request->role, ["admin cabang"]) && $request->kode_pc ? $request->kode_pc : "";

                if ($request->password) {
                    $user->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
                        'provId' => $provId,
                        'cabangId' => $cabangId,
                        'status_active' => $request->status,
                    ]);
                } else {
                    $user->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'role' => $request->role,
                        'provId' => $provId,
                        'cabangId' => $cabangId,
                        'status_active' => $request->status,
                    ]);
                }

                return redirect()->back()->with('success', 'Berhasil mengubah akun administrator');
            }
            return redirect()->back()->with('error', 'Invalid User Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }

    public function destroy(User $user) {
        try {
            if ($user) {
                $user->delete();
                return redirect()->back()->with('success', 'Berhasil menghapus akun administrator');
            }
            return redirect()->back()->with('error', 'Invalid User Id');

        } catch (\Exception $e) {
            throw new CatchErrorException($e);
        }
    }
}
