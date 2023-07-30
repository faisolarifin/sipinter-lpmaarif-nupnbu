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

    public function pdfUploadViewer(string $fileName) {
        if ($fileName) {
            $filepath = storage_path("app/uploads/".$fileName);

            if (!file_exists($filepath)) return response("File not found!");
            return response()->file($filepath);
        }
        return response("Invalid Document!");
    }

    public function pdfGeneratedViewer(string $type=null, string $fileName=null) {
        if ($fileName && $type) {
            $filepath = storage_path("app/generated/".$type."/".$fileName);

            if (!file_exists($filepath)) return response("File not found!");
            return response()->file($filepath);
        }
        return response("Invalid Document!");
    }
}
