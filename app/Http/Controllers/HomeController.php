<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\JobService;
use App\Models\JobSparepart;
use App\Models\JobProgram;
use App\Models\JobJoki;
use App\Models\JobTopup;
use App\Models\JobDrink;
use App\Models\Komisi;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $dataJobService = JobService::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
        // $dataJobSparepart = JobSparepart::whereBetween('tanggal', [$startDate, $endDate])->get();
        // $dataJobProgram = JobProgram::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
        // $dataJobJoki = JobJoki::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
        // $dataJobTopup = JobTopup::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
        // $dataJobDrink = JobDrink::whereBetween('tanggal', [$startDate, $endDate])->get();
        // $dataKomisi = Komisi::whereBetween('tanggal', [$startDate, $endDate])->get();
        // $dataPengeluaran = Pengeluaran::whereBetween('tanggal', [$startDate, $endDate])->get();

        return view('admin.dashboard');
    }
}