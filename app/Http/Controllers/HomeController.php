<?php

namespace App\Http\Controllers;

use App\Services\FinancialReportService;

class HomeController extends Controller
{
    public function index()
    {
        $currentMonth = date('m');
        // $currentMonth = 6;
        // dd($currentMonth);
    
        $jenisLaporan = null;
        $dateInput = null;
        $startDate = null;
        $endDate = null;
    
        // Inisialisasi array untuk menyimpan data bulanan
        $keuntunganBulanan = [];
        $pengeluaranBulanan = [];
    
        // Looping untuk mendapatkan data setiap bulan
        for ($month = 1; $month <= 12; $month++) {
            // Format monthYear sebagai 'YYYY-m'
            $monthYear = "2024-" . $month;
    
            // Dapatkan data laporan keuangan bulanan
            $financialData = FinancialReportService::generateFinancialData($jenisLaporan, $dateInput, $monthYear, $startDate, $endDate);
    
            // Simpan data keuntungan dan pengeluaran per bulan
            $keuntunganBulanan[$month] = $financialData['totalSeluruhKeuntungan'];
            $pengeluaranBulanan[$month] = $financialData['totalPengeluaran'];
        }
    
        // Dapatkan data lain seperti pada contoh Anda sebelumnya
        $financialData = FinancialReportService::generateFinancialData($jenisLaporan, $dateInput, "2024-" . $currentMonth, $startDate, $endDate);

        $monthYear = null;
        $financialDataAll = FinancialReportService::generateFinancialData($jenisLaporan, $dateInput, $monthYear, $startDate, $endDate);
        // dump($financialDataAll);
        
        $jobService = $financialData['dataJobService'];
        $jobSparepart = $financialData['dataJobSparepart'];
        $jobProgram = $financialData['dataJobProgram'];
        $jobJoki = $financialData['dataJobJoki'];
        $jobTopup = $financialData['dataJobTopup'];
        $jobDrink = $financialData['dataJobDrink'];
        $komisi = $financialData['dataKomisi'];
        $pengeluaran = $financialData['totalPengeluaran'];
        $keuntungan = $financialData['totalSeluruhKeuntungan'];
    
        $jmlJobService = $jobService->count();
        $jmlJobSparepart = $jobSparepart->count();
        $jmlJobProgram = $jobProgram->count();
        $jmlJobJoki = $jobJoki->count();
        $jmlJobTopup = $jobTopup->count();
        $jmlJobDrink = $jobDrink->count();
        $jmlKomisi = $komisi->count();
    
        $jmlTransaksi = $jmlJobService + $jmlJobSparepart + $jmlJobProgram + $jmlJobJoki + $jmlJobTopup + $jmlJobDrink + $jmlKomisi;
    
        // Siapkan data untuk dikirim ke view
        $data['jmlJobService'] = $jmlJobService;
        $data['jmlJobSparepart'] = $jmlJobSparepart;
        $data['jmlJobProgram'] = $jmlJobProgram;
        $data['jmlJobJoki'] = $jmlJobJoki;
        $data['jmlJobTopup'] = $jmlJobTopup;
        $data['jmlJobDrink'] = $jmlJobDrink;
        $data['jmlKomisi'] = $jmlKomisi;
        $data['jmlTransaksi'] = $jmlTransaksi;
        $data['pengeluaran'] = $pengeluaran;
        $data['keuntungan'] = $keuntungan;
        $data['totalKeuntungan']= $financialDataAll['totalSeluruhKeuntungan'];
    
        // Tambahkan data keuntungan dan pengeluaran bulanan
        $data['keuntunganBulanan'] = $keuntunganBulanan;
        $data['pengeluaranBulanan'] = $pengeluaranBulanan;
    
        return view('admin.dashboard', $data);
    }
    
}