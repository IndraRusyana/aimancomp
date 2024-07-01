<?php

namespace App\Http\Controllers;

use App\Services\FinancialReportService;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends Controller
{
    public function generateFinancialReport(Request $request)
    {
        $jenisLaporan = $request->jenisLaporan;
        $resultForReport = $request->resultForReport;
        $dateInput = null;
        $monthYear = null;
        $startDate = null;
        $endDate = null;

        if ($jenisLaporan === 'hari') {
            
            $dateInput = $resultForReport;
        } elseif ($jenisLaporan === 'bulan') {
            
            $monthYear = $resultForReport;
        } elseif ($jenisLaporan === 'periode') {
            
            $dates = explode(' - ', $resultForReport);
            $startDate = $dates[0];
            $endDate = $dates[1];
        }
        

        $financialData = FinancialReportService::generateFinancialData($jenisLaporan, $dateInput, $monthYear, $startDate, $endDate);
        // Render view ke dalam PDF
        $view = view('pdf.laporan-keuangan', $financialData);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view->render());

        // Setting ukuran dan orientasi halaman
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (output)
        $dompdf->render();

        // Mengunduh file PDF
        return $dompdf->stream("laporan_keuangan.pdf", array("Attachment" => false));
    }
}
