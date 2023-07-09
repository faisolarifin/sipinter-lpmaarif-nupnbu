<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditInformasiRequest;
use App\Http\Requests\PostInformasiRequest;
use App\Models\Informasi;
use App\Models\InformasiFile;
use App\Models\Provinsi;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropinsiController extends Controller
{
    public function index() {

        $listPropinsi = Provinsi::get();
        return view('admin.master.datapropinsi', compact('listPropinsi'));
    }

    public function create() {

        return view('admin.informasi.tambah');
    }

    public function store(PostInformasiRequest $request) {
        try {
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public');
            }
            $post = Informasi::create([
                'slug' => Str::slug($request->headline),
                'headline' => $request->headline,
                'type' => $request->type,
                'content' => $request->contents,
                'tgl_upload' => Carbon::now(),
                'tag' => $request->tag,
                'image' => $path,
            ]);
            if ($request->hasFile('fileuploads')) {
                foreach ($request->file('fileuploads') as $file) {
                    $path =  $file->store('fileInformasi');
                    InformasiFile::create([
                        'id_info' => $post->id_info,
                        'fileupload' => $path,
                    ]);
                }
            }

            return redirect()->route('informasi.index')->with('success', 'Berhasil posting informasi');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit(Informasi $informasi) {
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(EditInformasiRequest $request, Informasi $informasi) {
        try {
            $path = null;
            if ($request->hasFile('image')) {
                Storage::delete($informasi->image);
                $path = $request->file('image')->store('public');
            }
            $informasi->update([
                'slug' => Str::slug($request->headline),
                'headline' => $request->headline,
                'type' => $request->type,
                'content' => $request->contents,
                'tag' => $request->tag,
                'image' => $path ?? $informasi->image,
            ]);
            if ($request->hasFile('fileuploads')) {
                $files = InformasiFile::where('id_info', '=', $informasi->id_info);
                foreach ($files->get() as $file) {
                    Storage::delete($file->fileupload);
                }
                $files->delete();
                foreach ($request->file('fileuploads') as $file) {
                    $path =  $file->store('fileInformasi');
                    InformasiFile::create([
                        'id_info' => $informasi->id_info,
                        'fileupload' => $path,
                    ]);
                }
            }

            return redirect()->route('informasi.index')->with('success', 'Berhasil update informasi');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function destroy(Informasi $informasi) {
        try {
            $files = InformasiFile::where('id_info', '=', $informasi->id_info);
            foreach ($files->get() as $file) {
                Storage::delete($file->fileupload);
            }
            Storage::delete($informasi->image);
            $files->delete();
            $informasi->delete();

            return redirect()->route('informasi.index')->with('success', 'Berhasil menghapus informasi');

        } catch (\Exception $e) {
            dd($e);
        }
    }
}
