<?php 
// app/Services/FinancialReportService.php

namespace App\Services;

use Carbon\Carbon;
use App\Models\JobService;
use App\Models\JobSparepart;
use App\Models\JobProgram;
use App\Models\JobJoki;
use App\Models\JobTopup;
use App\Models\JobDrink;
use App\Models\Pengeluaran;

class FinancialReportService
{
    public static function generateFinancialData($jenisLaporan, $dateInput, $monthYear, $startDate, $endDate)
    {
        $result = [];
        $result['jenisLaporan'] = $jenisLaporan;
        $result['resultForReport'] = '';


        if ($dateInput) {
            // Query untuk data berdasarkan tanggal
            $dataJobService = JobService::where('status', 'selesai')->whereDate('tanggal', $dateInput)->get();
            $dataJobSparepart = JobSparepart::whereDate('tanggal', $dateInput)->get();
            $dataJobProgram = JobProgram::where('status', 'selesai')->whereDate('tanggal', $dateInput)->get();
            $dataJobJoki = JobJoki::where('status', 'selesai')->whereDate('tanggal', $dateInput)->get();
            $dataJobTopup = JobTopup::where('status', 'selesai')->whereDate('tanggal', $dateInput)->get();
            $dataJobDrink = JobDrink::whereDate('tanggal', $dateInput)->get();
            $dataPengeluaran = Pengeluaran::whereDate('tanggal', $dateInput)->get();

            $result['titlePeriode'] = Carbon::parse($dateInput)->translatedFormat('l, d F Y');
            $result['resultForReport'] = $dateInput;

        } elseif ($monthYear) {
            list($yearInput, $monthInput) = explode('-', $monthYear);

            // Query untuk data berdasarkan bulan
            $dataJobService = JobService::where('status', 'selesai')->whereMonth('tanggal', $monthInput)->get();
            $dataJobSparepart = JobSparepart::whereMonth('tanggal', $monthInput)->get();
            $dataJobProgram = JobProgram::where('status', 'selesai')->whereMonth('tanggal', $monthInput)->get();
            $dataJobJoki = JobJoki::where('status', 'selesai')->whereMonth('tanggal', $monthInput)->get();
            $dataJobTopup = JobTopup::where('status', 'selesai')->whereMonth('tanggal', $monthInput)->get();
            $dataJobDrink = JobDrink::whereMonth('tanggal', $monthInput)->get();
            $dataPengeluaran = Pengeluaran::whereMonth('tanggal', $monthInput)->get();

            $result['titlePeriode'] = Carbon::createFromDate($yearInput, $monthInput, 1)->translatedFormat('F Y');
            $result['resultForReport'] = $monthYear;

        } elseif ($startDate && $endDate) {
            // Query untuk data berdasarkan rentang tanggal
            $result['titlePeriode'] = Carbon::parse($startDate)->translatedFormat('d F Y') . ' - ' . Carbon::parse($endDate)->translatedFormat('d F Y');
            $result['resultForReport'] = $startDate . ' - ' . $endDate;

            $dataJobService = JobService::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
            $dataJobSparepart = JobSparepart::whereBetween('tanggal', [$startDate, $endDate])->get();
            $dataJobProgram = JobProgram::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
            $dataJobJoki = JobJoki::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
            $dataJobTopup = JobTopup::where('status', 'selesai')->whereBetween('tanggal', [$startDate, $endDate])->get();
            $dataJobDrink = JobDrink::whereBetween('tanggal', [$startDate, $endDate])->get();
            $dataPengeluaran = Pengeluaran::whereBetween('tanggal', [$startDate, $endDate])->get();

        } else {
            // Query untuk semua data
            $dataJobService = JobService::where('status', 'selesai')->get();
            $dataJobSparepart = JobSparepart::all();
            $dataJobProgram = JobProgram::where('status', 'selesai')->get();
            $dataJobJoki = JobJoki::where('status', 'selesai')->get();
            $dataJobTopup = JobTopup::where('status', 'selesai')->get();
            $dataJobDrink = JobDrink::all();
            $dataPengeluaran = Pengeluaran::all();

            $result['titlePeriode'] = 'Semua waktu';
        }

        $result['dataPengeluaran'] = $dataPengeluaran;

        // Hitung total keuntungan untuk masing-masing jenis
        $result['totalKeuntunganJobService'] = self::calculateTotalKeuntungan($dataJobService, 'harga');
        $result['totalKeuntunganJobSparepart'] = self::calculateTotalKeuntungan($dataJobSparepart, 'harga_jual', 'harga_awal');
        $result['totalKeuntunganJobProgram'] = self::calculateTotalKeuntungan($dataJobProgram, 'harga');
        $result['totalKeuntunganJobJoki'] = self::calculateTotalKeuntungan($dataJobJoki, 'harga');
        $result['totalKeuntunganJobTopup'] = self::calculateTotalKeuntungan($dataJobTopup, 'harga_jual', 'modal');
        $result['totalKeuntunganJobDrink'] = self::calculateTotalKeuntungan($dataJobDrink, 'harga_jual', 'modal');
        $result['totalPengeluaran'] = self::calculateTotalKeuntungan($dataPengeluaran, 'nominal');

        // menghitung harga jual dan harga awal / modal
        $totalHargaJobSparepart = 0; 
        $totalModalJobSparepart = 0;
        foreach ($dataJobSparepart as $key) {
            $totalHargaJobSparepart += $key->harga_jual;
            $totalModalJobSparepart += $key->harga_awal;
        }
        $result['totalHargaJobSparepart'] = $totalHargaJobSparepart;
        $result['totalModalJobSparepart'] = $totalModalJobSparepart;

        // Menghitung total harga untuk JobTopup
        $totalHargaJobTopup = 0; 
        $totalModalJobTopup = 0; 
        foreach ($dataJobTopup as $key) {
            $totalHargaJobTopup += $key->harga_jual;
            $totalModalJobTopup += $key->modal;
        }
        $result['totalHargaJobTopup'] = $totalHargaJobTopup;
        $result['totalModalJobTopup'] = $totalModalJobTopup;

        // Menghitung total harga untuk JobDrink
        $totalHargaJobDrink = 0; 
        $totalModalJobDrink = 0; 
        foreach ($dataJobDrink as $key) {
            $totalHargaJobDrink += $key->harga_jual;
            $totalModalJobDrink += $key->modal;
        }
        $result['totalHargaJobDrink'] = $totalHargaJobDrink;
        $result['totalModalJobDrink'] = $totalModalJobDrink;

        // Hitung total seluruh keuntungan
        $result['totalSeluruhKeuntungan'] = $result['totalKeuntunganJobService'] +
                                             $result['totalKeuntunganJobSparepart'] +
                                             $result['totalKeuntunganJobProgram'] +
                                             $result['totalKeuntunganJobJoki'] +
                                             $result['totalKeuntunganJobTopup'] +
                                             $result['totalKeuntunganJobDrink'];

        // Hitung dana pengembangan, bagi hasil, dan keuntungan investor/owner
        $result['danaPengembangan'] = self::hitungPersentase($result['totalSeluruhKeuntungan'], 20);
        $result['danaBagiHasil'] = self::hitungPersentase($result['totalSeluruhKeuntungan'], 80);

        // hitung total keuntuangan per layanana
        $result['totalKeuntunganPerLayanan'] = self::hitungPersentase($result['totalKeuntunganJobService'], 40) +
                                             self::hitungPersentase($result['totalKeuntunganJobSparepart'], 100) +
                                             self::hitungPersentase($result['totalKeuntunganJobProgram'], 20) +
                                             self::hitungPersentase($result['totalKeuntunganJobJoki'], 40) +
                                             self::hitungPersentase($result['totalKeuntunganJobTopup'], 100) +
                                             self::hitungPersentase($result['totalKeuntunganJobDrink'], 100);

        // pengeluaran investor
        $result['kontribusiInvestor1'] = self::hitungKontribusiInvestor($result['totalKeuntunganPerLayanan'],$result['totalSeluruhKeuntungan'],50);
        $result['kontribusiInvestor2'] = self::hitungKontribusiInvestor($result['totalKeuntunganPerLayanan'],$result['totalSeluruhKeuntungan'],2);

        $result['pengeluaranInvestor1'] = $result['totalPengeluaran'] * $result['kontribusiInvestor1'];
        $result['pengeluaranInvestor2'] = $result['totalPengeluaran'] * $result['kontribusiInvestor2'];

        // pengeluaran owner
        $result['pengeluaranOwner'] = $result['totalPengeluaran'] - $result['pengeluaranInvestor1'] - $result['pengeluaranInvestor2'];

        // menghitung keuntungan bersih investor dan owner
        $result['keuntunganBersihInvestor1'] = $result['danaBagiHasil'] * $result['kontribusiInvestor1'] - $result['pengeluaranInvestor1'];
        $result['keuntunganBersihInvestor2'] = $result['danaBagiHasil'] * $result['kontribusiInvestor2'] - $result['pengeluaranInvestor2'];
        $result['keuntunganBersihOwner'] = $result['danaBagiHasil'] - ($result['keuntunganBersihInvestor1'] + $result['keuntunganBersihInvestor2']);

        // Hitung persentase untuk masing-masing jenis
        $result['prsntService'] = self::hitungPersentase($result['totalKeuntunganJobService'], 40);
        $result['prsntSparepart'] = self::hitungPersentase($result['totalKeuntunganJobSparepart'], 100);
        $result['prsntProgram'] = self::hitungPersentase($result['totalKeuntunganJobProgram'], 20);
        $result['prsntJoki'] = self::hitungPersentase($result['totalKeuntunganJobJoki'], 40);
        $result['prsntTopup'] = self::hitungPersentase($result['totalKeuntunganJobTopup'], 100);
        $result['prsntDrink'] = self::hitungPersentase($result['totalKeuntunganJobDrink'], 100);

        return $result;
    }

    // Method untuk menghitung total keuntungan
    private static function calculateTotalKeuntungan($data, $field, $additionalField = null)
    {
        $totalHarga = 0;
        $totalModal = 0;

        foreach ($data as $item) {
            $totalHarga += $item->{$field};

            if ($additionalField && isset($item->{$additionalField})) {
                $totalModal += $item->{$additionalField};
            }
        }

        return $totalHarga - $totalModal;
    }

    // Method untuk menghitung persentase
    private static function hitungPersentase($nilai, $persen)
    {
        return $nilai * ($persen / 100);
    }

    // Method untuk menghitung persentase kontribusi investor
    private static function hitungKontribusiInvestor( $totalKeuntunganPerLayanan, $totalSeluruhKeuntungan, $persen)
    {
        $persen = ($persen / 100);
        $kontribusiInvestor = $totalKeuntunganPerLayanan / $totalSeluruhKeuntungan * $persen;
        return $kontribusiInvestor;
    }
}
