<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generateAndSaveQuotationPDF($data = [])
    {
        //return view('pdf.quotation', compact('data'));
        $pdf = Pdf::loadView('pdf.quotation', compact('data'))
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'isRemoteEnabled' => true, // Ensures public_path() images work
                'defaultPaperSize' => 'a4'
            ]);

        // Store PDF Temporarily
        $fileName = $data['filename'] . '_' . time() . '.pdf';
        $filePath = 'public/pdfs/quotations/' . $fileName;
        Storage::put($filePath, $pdf->output());

        //return $pdf->stream('multipage_document.pdf');
        return $filePath;
        //return $pdf->download('multipage_document.pdf'); // Download PDF
    }
}
