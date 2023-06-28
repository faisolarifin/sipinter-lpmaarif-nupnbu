<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Export\ExportDocument;

class ExportController extends Controller
{
    public function exportPiagamDocument(int $satpenId=1)
    {
        return ExportDocument::exportPiagamDokumen($satpenId);
    }
}
