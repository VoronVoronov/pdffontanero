<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $data = $request->all();
        $generatedPdfFilename = sprintf('export-%s.pdf', time());
        SnappyPdf::setPaper('A4', 'landscape');
        SnappyPdf::setOption('margin-top', 0);
        SnappyPdf::setOption('margin-bottom', 0);
        SnappyPdf::setOption('margin-left', 0);
        SnappyPdf::setOption('margin-right', 0);
        $pdf = SnappyPdf::loadView('data', $data)->output();
        $disk = Storage::disk('public');
        if ($disk->put($generatedPdfFilename, $pdf)) {
            $disk->path($generatedPdfFilename);
        }
        return $generatedPdfFilename;

    }
}
