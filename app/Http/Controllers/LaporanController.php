<?php

namespace App\Http\Controllers;

use App\Models\JobService;
use App\Models\JobSparepart;
use App\Models\JobProgram;
use App\Models\JobJoki;
use App\Models\JobTopup;
use App\Models\JobDrink;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\FinancialReportService;

class LaporanController extends Controller
{
    // LaporanController.php
    public function index(Request $request)
    {
        $jenisLaporan = $request->jenis_laporan;
        $dateInput = $request->date_input;
        $monthYear = $request->month_input;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $financialData = FinancialReportService::generateFinancialData($jenisLaporan, $dateInput, $monthYear, $startDate, $endDate);
        dump($financialData);
        // Mengirim data harga ke view
        return view('admin.laporan', $financialData);
    }

}