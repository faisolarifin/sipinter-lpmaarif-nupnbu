<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Settings extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function get($lookup) {
        $settings = Setting::pluck('value', 'lookup')->all();
        if (array_key_exists($lookup, $settings)) {
            return $settings[$lookup];
        }
        return null;
    }

    public function pageSetting() {
        $settings = Setting::orderBy('id')->get()->toArray();
        return view('admin.users.setting', compact('settings'));
    }

    public function saveSetting(Request $request) {

        $request->validate([
            'template_piagam' => 'file|mimes:docx|max:2024',
            'template_sk' => 'file|mimes:docx|max:2024'
        ]);

        foreach(Setting::pluck('value', 'lookup')->all() as $key => $setting) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = str_replace("#", "", $file->getClientOriginalName());
                $file->storeAs('templates', $filename);
                unlink(storage_path('app/templates/'.$setting));
                Setting::where("lookup", '=', $key)->update([
                    "value" => $filename,
                ]);
            } elseif ($request->input($key) != null && $request->input($key) != $setting) {
                Setting::where("lookup", '=', $key)->update([
                    "value" => $request->input($key)
                ]);
            }
        }
        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan');
    }
}
