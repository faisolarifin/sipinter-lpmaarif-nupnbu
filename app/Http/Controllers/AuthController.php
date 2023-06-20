<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Satpen;
use App\Models\User;
use App\Helpers\DapoKemdikbud;
use App\Http\Requests\CekNpsnRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerPage() {
        $request = Request::capture();
        $cookieValue = $request->cookie('dapo');

        if (!$cookieValue) return redirect()->route('ceknpsn');

        $cookieValue = json_decode($cookieValue);
        $kabupaten = Kabupaten::orderBy('id_kab')->get();
        $propinsi = Provinsi::orderBy('id_prov')->get();
        $jenjang = Jenjang::orderBy('id_jenjang')->get();
        return view('auth.register', compact('cookieValue', 'kabupaten', 'propinsi', 'jenjang'));
    }

    public function loginPage() {
        return view('auth.login');
    }

    public function loginProses(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->only('username', 'password')))
            {
                return redirect()->back()->with('error', 'Invalid username or password');
            }

            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function cekNpsnPage() {
        return view('auth.ceknpsn');
    }

    public function checkNpsn(CekNpsnRequest $request)
    {
        try {
            /**
             * Cek npsn on kemendikbud server by api
             */
            $cloneSekolah = new DapoKemdikbud();
            $cloneSekolah->clone($request->npsn);

            if ($cloneSekolah->getStatus() && $cloneSekolah->getResult() !== null) {
                $jsonResultSekolah = $cloneSekolah->getResult();

                if (sizeof($jsonResultSekolah) <= 0) {
                    return redirect()->back()->with('error', 'NPSN not found');
                }
                $jsonResultSekolah = $jsonResultSekolah[0];
                /**
                 * Cek npsn on system based on npsn number
                 */
                if (Satpen::where(['npsn' => $jsonResultSekolah->npsn])->first()) {
                    return redirect()->back()->with('error', 'NPSN already registered on system');
                }
                setcookie('dapo', json_encode($jsonResultSekolah), time() + (60 * 10), "/");
                return redirect()->route('register');
            }

            return redirect()->back()->with('error', 'Cannot Check NPSN');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }
    }

    /**
     * @param string $registerNumber
     * @param string $password
     * @return mixed
     */
    public static function register(string $registerNumber, string $password)
    {
        return User::create([
            'username' => $registerNumber,
            'password' => Hash::make($password),
            'role' => 'operator',
            'status_active' => 'active'
        ]);
    }

    /**
     * @param $registerNumber
     * @return bool
     */

    public static function updateUsername($registerNumber) {
        if (User::find(auth()->user()->id_user)->update([
            'username' => $registerNumber
        ])) {
            return true;
        }
        return false;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */

    public function registerSuccess()
    {
        if (!Session::get('regNumber')) return redirect()->route('login');
        return view('auth.registersuccess');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = User::find(auth()->user()->id_user);
        /**
         * If input user password not equal with stored password
         */
        if (!Hash::check($request->password_lama, auth()->user()->password)) return redirect()->back()->with('error', 'Password lama salah');
        /**
         * Update db.users.password
         */
        try {
            $user->update(
                ["password" => Hash::make($request->password_baru)]
            );
            return redirect()->route('login')->with('success', 'Password berhasil diganti');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', 'anda berhasil logout');
    }

}
