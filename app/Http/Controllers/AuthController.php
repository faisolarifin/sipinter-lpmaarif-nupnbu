<?php

namespace App\Http\Controllers;

use App\Exceptions\CatchErrorException;
use App\Helpers\ReferensiKemdikbud;
use App\Helpers\Strings;
use App\Models\Jenjang;
use App\Models\Kabupaten;
use App\Models\PengurusCabang;
use App\Models\Provinsi;
use App\Models\Satpen;
use App\Models\User;
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
        try {
            $request = Request::capture();
            $cookieValue = $request->cookie('dapo');

            if (!$cookieValue) return redirect()->route('ceknpsn');

            $cookieValue = json_decode($cookieValue);

            $keyProv = Strings::removeFirstWord($cookieValue->propinsiluar_negeri_ln);
            $selectedProv = Provinsi::where('nm_prov', 'like', $keyProv)->first();
            if ($selectedProv) {
                $kabupaten = Kabupaten::where('id_prov', '=', $selectedProv->id_prov)
                                ->orderBy('id_kab')->get();
                $cabang = PengurusCabang::where('id_prov', '=', $selectedProv->id_prov)
                                ->orderBy('id_pc')->get();
                $propinsi = Provinsi::orderBy('id_prov')->get();
                $jenjang = Jenjang::orderBy('id_jenjang')->get();

                return view('auth.register', compact('cookieValue', 'kabupaten', 'propinsi', 'jenjang', 'cabang'));
            }
            return redirect()->back()->with("error", "Provinsi belum ada pada sistem");

        } catch (\Exception $e) {
            throw new CatchErrorException("[REGISTER PAGE] has error ". $e);
        }
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

            if (auth()->user()->role == 'operator') {
                return redirect()->route('dashboard');
            }
            elseif (auth()->user()->role == 'admin') {
                return redirect()->route('a.dash');
            }

        } catch (\Exception $e) {
            throw new CatchErrorException("[LOGIN PROSES] has error ". $e);
        }
    }

    public function cekNpsnPage() {
        return view('auth.ceknpsn');
    }

    public function checkNpsn(CekNpsnRequest $request)
    {
        try {
            /**
             * Cek npsn on referensi.data.kemdikbud.go.id/
             */
            $cloneSekolah = new ReferensiKemdikbud();
            $cloneSekolah->clone($request->npsn);

            if ($cloneSekolah->getStatus() && $cloneSekolah->getResult() !== null) {
                $jsonResultSekolah = $cloneSekolah->getResult();
                /**
                 * Cek npsn on system based on npsn number
                 */
                if (Satpen::where(['npsn' => $jsonResultSekolah["npsn"]])->first()) {
                    return redirect()->back()->with('error', 'NPSN already registered on system');
                }
                setcookie('dapo', json_encode($jsonResultSekolah), time() + (60 * 10), "/");
                return redirect()->route('register');
            }

            return redirect()->back()->with('error', $cloneSekolah->getResult());

        } catch (\Exception $e) {
            throw new CatchErrorException("[CHECK NPSN] has error ". $e);
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
        if (!Hash::check($request->last_pass, auth()->user()->password)) return redirect()->back()->with('error', 'Password lama salah');
        /**
         * Update db.users.password
         */
        try {
            $user->update(
                ["password" => Hash::make($request->new_pass)]
            );
            $this->logout();
            return redirect()->route('login')->with('success', 'Password berhasil diganti');

        } catch (\Exception $e) {
            throw new CatchErrorException("[CHANGE PASSWORD] has error ". $e);
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
