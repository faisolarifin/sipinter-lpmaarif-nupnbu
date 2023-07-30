<?php

namespace App\Http\Controllers;


class FileViewerController extends Controller
{
    public function viewBuktiPembayaran(string $fileName) {
        if ($fileName) {
            $filepath = storage_path("app/buktibayar/". $fileName);

            if (!file_exists($filepath)) return response("File not found!");
            return response()->file($filepath);
        }
        return response("Invalid Document!");
    }
}
