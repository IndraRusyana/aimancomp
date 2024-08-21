<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FinancialReportService;
use App\Models\Investor;

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
        // dd($jenisLaporan);

        $financialData = FinancialReportService::generateFinancialData($jenisLaporan, $dateInput, $monthYear, $startDate, $endDate);
        // dump($financialData);

        $data['name'] = auth()->user()->name;
        $data['role'] = auth()->user()->role;
        $data['email'] = auth()->user()->email;

        if ($data['role'] == "investor") {
            $investor = Investor::where('email',$data['email'])->first();
            $data['prsnt_investasi'] = $investor->prsnt_investasi;
        } else {
            $data['investor'] = Investor::all();
        }
 
        return view('admin.laporan', $financialData, $data);
    }

}