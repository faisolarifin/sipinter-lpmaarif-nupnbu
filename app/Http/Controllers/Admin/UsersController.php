<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\CatchErrorException;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() {

        $usersAdmin = User::whereIn("role", ["admin", "super admin", "admin pusat", "admin wilayah", "admin cabang"])
                            ->get();
        return view('admin.users.users', compact('usersAdmin'));

    }

    public function store(Request $request) {

        try {
            $this->validate($request, [
               'name' => 'required',
               'username' => 'required',
               'password' => 'required',
               'role' => 'required|in:super admin,admin pusat,admin wilayah,admin cabang',
            ]);

            User::create([
               'name' => $request->name,
               'username' => $request->username,
               'password' => Hash::make($request->password),
               'role' => $request->role,
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

        try {
            if ($user) {
                $this->validate($request, [
                    'role' => 'in:super admin,admin pusat,admin wilayah,admin cabang',
                    'status' => 'in:active,block'
                ]);

                if ($request->password) {
                    $user->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'password' => Hash::make($request->password),
                        'role' => $request->role,
                        'status_active' => $request->status,
                    ]);
                } else {
                    $user->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'role' => $request->role,
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
