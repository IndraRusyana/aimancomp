<?php

namespace App\Http\Controllers;

use App\Services\FinancialReportService;
use App\Models\JobService;
use App\Models\JobSparepart;
use App\Models\JobProgram;
use App\Models\JobJoki;
use App\Models\JobTopup;
use App\Models\JobDrink;
use App\Models\Pengeluaran;
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
        ob_end_clean();
        // Mengunduh file PDF
        return $dompdf->stream("laporan_keuangan.pdf", array("Attachment" => false));
    }

    public function generateJobReport(request $request){
        $job = $request->job;
        // dd($job);
        if($job === "Service"){
            $query = JobService::all();
            $columnsSubset = ['merk', 'harga', 'tanggal'];
            $total = JobService::where('status', 'selesai')->sum('harga');
        }
        if($job === "Sparepart"){
            $query = JobSparepart::all();
            $columnsSubset = ['nama', 'harga_awal', 'harga_jual', 'tanggal'];
            $harga_awal = JobSparepart::sum('harga_awal');
            $harga_jual = JobSparepart::sum('harga_jual');
            $total = $harga_jual - $harga_awal;
        }
        if($job === "Aplikasi"){
            $query = JobProgram::all();
            $columnsSubset = ['nama_project', 'harga', 'tanggal'];
            $total = JobProgram::where('status', 'selesai')->sum('harga');
        }
        if($job === "Joki"){
            $query = JobJoki::all();
            $columnsSubset = ['nama_tugas', 'harga', 'tanggal'];
            $total = JobJoki::where('status', 'selesai')->sum('harga');
        }
        if($job === "Topup"){
            $query = JobTopup::where('status', 'selesai')->get();
            $columnsSubset = ['provider', 'modal', 'harga_jual', 'tanggal'];
            $modal = JobTopup::where('status', 'selesai')->sum('modal');
            $harga_jual = JobTopup::where('status', 'selesai')->sum('harga_jual');
            $total = $harga_jual - $modal;
        }
        if($job === "Minuman"){
            $query = JobDrink::all();
            $columnsSubset = ['nama', 'modal', 'harga_jual', 'tanggal'];
            $modal = JobDrink::sum('modal');
            $harga_jual = JobDrink::sum('harga_jual');
            $total = $harga_jual - $modal;
        }
        if($job === "Pengeluaran"){
            $query = Pengeluaran::all();
            $columnsSubset = ['nama_pengeluaran','nominal','tanggal'];
            $total = Pengeluaran::sum('nominal');
        }


        // Render view ke dalam PDF
        $view = view('pdf.laporan-pekerjaan', compact('query','columnsSubset','job','total'));
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view->render());

        // Setting ukuran dan orientasi halaman
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (output)
        $dompdf->render();
        ob_end_clean();
        // Mengunduh file PDF
        return $dompdf->stream("laporan_pekerjaan.pdf", array("Attachment" => false));

    }
}
