<?php

namespace App\Export;
use App\Helpers\Date;
use App\Helpers\GenerateQr;
use App\Models\Satpen;
use Carbon\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportDocument
{
    public static function exportPiagamDokumen(int $satpenId)
    {
        try {
            $filePath = storage_path('templates/');
            $templateName = $filePath. "Piagam_Template.docx";
            $qrPath  = $filePath. "qrcode.png";
            $tempFilename = $filePath. "Piagam.docx";
            $exportFilename = "Piagam1.pdf";

            $templateDocument = new TemplateProcessor($templateName);

            if ($satpenId) {
                $satpenProfile = Satpen::with(['kategori', 'provinsi', 'kabupaten', 'jenjang'])
                    ->where('id_user', '=', $satpenId)
                    ->first();

                if (!$satpenProfile) return redirect()->back()->with('error', 'Forbidden to access satpen profile');

                if (GenerateQr::make('Life is too short to be generating QR codes', $qrPath)) {
                    $templateDocument->setValue('kategori', $satpenProfile->kategori->nm_kategori);
                    $templateDocument->setValue('noregistrasi', $satpenProfile->no_registrasi);
                    $templateDocument->setValue('npsn', $satpenProfile->npsn);
                    $templateDocument->setValue('nama', $satpenProfile->nm_satpen);
                    $templateDocument->setValue('yayasan', $satpenProfile->yayasan);
                    $templateDocument->setValue('alamat', $satpenProfile->alamat);
                    $templateDocument->setValue('kecamatan', $satpenProfile->kecamatan);
                    $templateDocument->setValue('kabupaten', $satpenProfile->kabupaten->nama_kab);
                    $templateDocument->setValue('propinsi', $satpenProfile->provinsi->nm_prov);
                    $templateDocument->setValue('tahunberdiri', $satpenProfile->thn_berdiri);
                    $templateDocument->setValue('tahunberdiri', $satpenProfile->thn_berdiri);
                    $templateDocument->setValue('telp', $satpenProfile->telpon);
                    $templateDocument->setValue('fax', $satpenProfile->fax);
                    $templateDocument->setValue('email', $satpenProfile->email);
                    $templateDocument->setValue('tempat', "Jakarta");
                    $templateDocument->setValue('tanggal', Date::tglIndo(Carbon::now()->format('Y-m-d')));
                    // Replace the QR code placeholder with the actual QR code image in the template
                    $templateDocument->setImageValue('qrcode',  array('path' => $qrPath, 'width' => 150, 'height' => 150));

                    $templateDocument->saveAs($tempFilename);
                    //Convert to pdf
                    $command = 'docx2pdf ' . $tempFilename . ' ' . $filePath. $exportFilename;

                    exec($command, $output, $returnCode);

                    if ($returnCode === 0) {
                        header("Content-Disposition: attachment; filename={$exportFilename}");
                        readfile($filePath. $exportFilename);
                        unlink($tempFilename);
                        unlink($filePath. $exportFilename);
                    } else {
                        echo 'Error converting Word document to PDF.';
                    }
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }

    }

}
