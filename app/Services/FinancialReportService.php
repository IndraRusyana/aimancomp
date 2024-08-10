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
use App\Models\Komisi;
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
            $dataKomisi = Komisi::whereDate('tanggal', $dateInput)->get();
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
            $dataKomisi = Komisi::whereMonth('tanggal', $monthInput)->get();
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
            $dataKomisi = Komisi::whereBetween('tanggal', [$startDate, $endDate])->get();
            $dataPengeluaran = Pengeluaran::whereBetween('tanggal', [$startDate, $endDate])->get();

        } else {
            // Query untuk semua data
            $dataJobService = JobService::where('status', 'selesai')->get();
            $dataJobSparepart = JobSparepart::all();
            $dataJobProgram = JobProgram::where('status', 'selesai')->get();
            $dataJobJoki = JobJoki::where('status', 'selesai')->get();
            $dataJobTopup = JobTopup::where('status', 'selesai')->get();
            $dataJobDrink = JobDrink::all();
            $dataKomisi = Komisi::all();
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
        $result['totalKomisi'] = self::calculateTotalKeuntungan($dataKomisi, 'nominal');

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

        // Hitung total seluruh keuntungan ( laba kotor )
        $result['totalSeluruhKeuntungan'] = $result['totalKeuntunganJobService'] +
                                             $result['totalKeuntunganJobSparepart'] +
                                             $result['totalKeuntunganJobProgram'] +
                                             $result['totalKeuntunganJobJoki'] +
                                             $result['totalKeuntunganJobTopup'] +
                                             $result['totalKeuntunganJobDrink'] +
                                             $result['totalKomisi'];

        // hitung total pengeluaran
        $result['totalPengeluaran'] = self::calculateTotalKeuntungan($dataPengeluaran, 'nominal');

        // array keuntungan per layanan
        $penghasilanPerLayanan = [
            'layanan1'=>$result['totalKeuntunganJobService'],
            'layanan2'=>$result['totalKeuntunganJobSparepart'],
            'layanan3'=>$result['totalKeuntunganJobProgram'],
            'layanan4'=>$result['totalKeuntunganJobJoki'],
            'layanan5'=>$result['totalKeuntunganJobTopup'],
            'layanan6'=>$result['totalKeuntunganJobDrink'],
            'layanan7'=>$result['totalKomisi']
        ];

        // hitung proporsi pengeluaran setiap layanan
        $proporsiPengeluaran = self::hitungPengeluaran($penghasilanPerLayanan, $result['totalPengeluaran']);

        // Hitung sisa penghasilan setelah dikurangi pengeluaran
        $sisaPenghasilan = [];
        foreach ($penghasilanPerLayanan as $layanan => $penghasilanLayanan) {
            $sisaPenghasilan[$layanan] = $penghasilanLayanan - $proporsiPengeluaran[$layanan];
        }

        $totalKeuntunganJobService = $sisaPenghasilan['layanan1'];
        $totalKeuntunganJobSparepart = $sisaPenghasilan['layanan2'];
        $totalKeuntunganJobProgram = $sisaPenghasilan['layanan3'];
        $totalKeuntunganJobJoki = $sisaPenghasilan['layanan4'];
        $totalKeuntunganJobTopup = $sisaPenghasilan['layanan5'];
        $totalKeuntunganJobDrink = $sisaPenghasilan['layanan6'];
        $totalKomisi = $sisaPenghasilan['layanan7'];

        $result['jobServiceDikurangiPengeluaran'] = $totalKeuntunganJobService;
        $result['jobSparepartDikurangiPengeluaran'] = $totalKeuntunganJobSparepart;
        $result['jobProgramDikurangiPengeluaran'] = $totalKeuntunganJobProgram;
        $result['jobJokiDikurangiPengeluaran'] = $totalKeuntunganJobJoki;
        $result['jobTopupDikurangiPengeluaran'] = $totalKeuntunganJobTopup;
        $result['jobDrinkDikurangiPengeluaran'] = $totalKeuntunganJobDrink;
        $result['totalKomisiDikurangiPengeluaran'] = $totalKomisi;
        
        // perhitungan dana pengembangan
        $result['danaPengembangan'] = 0;
        $result['danaPengembangan'] += self::hitungPersentase($totalKeuntunganJobService,1);
        $result['danaPengembangan'] += self::hitungPersentase($totalKeuntunganJobSparepart,1);
        $result['danaPengembangan'] += self::hitungPersentase($totalKeuntunganJobProgram,1);
        $result['danaPengembangan'] += self::hitungPersentase($totalKeuntunganJobJoki,1);
        $result['danaPengembangan'] += self::hitungPersentase($totalKeuntunganJobTopup,1);
        $result['danaPengembangan'] += self::hitungPersentase($totalKeuntunganJobDrink,1);
        $result['danaPengembangan'] += self::hitungPersentase($totalKomisi,1);

        // perhitungan keuntungan setiap layanan setelah diambil dana pengembangan
        $totalKeuntunganJobService -= self::hitungPersentase($totalKeuntunganJobService,1);
        $totalKeuntunganJobSparepart -= self::hitungPersentase($totalKeuntunganJobSparepart,1);
        $totalKeuntunganJobProgram -= self::hitungPersentase($totalKeuntunganJobProgram,1);
        $totalKeuntunganJobJoki -= self::hitungPersentase($totalKeuntunganJobJoki,1);
        $totalKeuntunganJobTopup -= self::hitungPersentase($totalKeuntunganJobTopup,1);
        $totalKeuntunganJobDrink -= self::hitungPersentase($totalKeuntunganJobDrink,1);
        $totalKomisi -= self::hitungPersentase($totalKomisi,1);

        $result['jobServiceDikurangiPengembangan'] = $totalKeuntunganJobService;
        $result['jobSparepartDikurangiPengembangan'] = $totalKeuntunganJobSparepart;
        $result['jobProgramDikurangiPengembangan'] = $totalKeuntunganJobProgram;
        $result['jobJokiDikurangiPengembangan'] = $totalKeuntunganJobJoki;
        $result['jobTopupDikurangiPengembangan'] = $totalKeuntunganJobTopup;
        $result['jobDrinkDikurangiPengembangan'] = $totalKeuntunganJobDrink;
        $result['komisiDikurangiPengembangan'] = $totalKomisi;

        $result['danaBagiHasil'] = $totalKeuntunganJobService +
                                    $totalKeuntunganJobSparepart +
                                    $totalKeuntunganJobProgram +
                                    $totalKeuntunganJobJoki +
                                    $totalKeuntunganJobTopup +
                                    $totalKeuntunganJobDrink;

        // perhitungan persentase untuk investor pada setiap layanan
        $result['totalKeuntunganInvestor'] = self::hitungPersentase($totalKeuntunganJobService, 40) +
                                             self::hitungPersentase($totalKeuntunganJobSparepart, 100) +
                                             self::hitungPersentase($totalKeuntunganJobProgram, 20) +
                                             self::hitungPersentase($totalKeuntunganJobJoki, 40) +
                                             self::hitungPersentase($totalKeuntunganJobTopup, 100) +
                                             self::hitungPersentase($totalKeuntunganJobDrink, 100);

        // perhitungan persentase untuk owner pada setiap layanan
        $result['KeuntunganOwnerDariLayanan'] = self::hitungPersentase($totalKeuntunganJobService, 60) +
                                             self::hitungPersentase($totalKeuntunganJobProgram, 80) +
                                             self::hitungPersentase($totalKeuntunganJobJoki, 60) +
                                             $totalKomisi;

        // perhitunngan pembagian investor
        $result['keuntunganInvestor1'] = $result['totalKeuntunganInvestor'] * 0.5;
        $result['keuntunganInvestor2'] = $result['totalKeuntunganInvestor'] * 0.02;
        $result['keuntunganOwnerDariInvestasi'] = $result['totalKeuntunganInvestor'] * 0.48;

        $result['dataLaporan'] = [
            [
                'Service', 
                $result['totalKeuntunganJobService'], 
                0, 
                $result['totalKeuntunganJobService'], 
                $result['jobServiceDikurangiPengeluaran'], 
                $result['jobServiceDikurangiPengembangan']
            ],
            [
                'Sparepart', 
                $result['totalHargaJobSparepart'], 
                $result['totalModalJobSparepart'], 
                $result['totalKeuntunganJobSparepart'], 
                $result['jobSparepartDikurangiPengeluaran'], 
                $result['jobSparepartDikurangiPengembangan']
            ],
            [
                'Web/aplikasi', 
                $result['totalKeuntunganJobProgram'], 
                0, 
                $result['totalKeuntunganJobProgram'], 
                $result['jobProgramDikurangiPengeluaran'], 
                $result['jobProgramDikurangiPengembangan']
            ],
            [
                'Joki', 
                $result['totalKeuntunganJobJoki'], 
                0, 
                $result['totalKeuntunganJobJoki'], 
                $result['jobJokiDikurangiPengeluaran'], 
                $result['jobJokiDikurangiPengembangan']
            ],
            [
                'Topup', 
                $result['totalHargaJobTopup'], 
                $result['totalModalJobTopup'], 
                $result['totalKeuntunganJobTopup'], 
                $result['jobTopupDikurangiPengeluaran'], 
                $result['jobTopupDikurangiPengembangan']
            ],
            [
                'Minuman', 
                $result['totalHargaJobDrink'], 
                $result['totalModalJobDrink'], 
                $result['totalKeuntunganJobDrink'], 
                $result['jobDrinkDikurangiPengeluaran'], 
                $result['jobDrinkDikurangiPengembangan']
            ],
            [
                'Komisi', 
                $result['totalKomisi'], 
                0, 
                $result['totalKomisi'], 
                $result['totalKomisiDikurangiPengeluaran'], 
                $result['komisiDikurangiPengembangan']
            ]
        ];

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

    // Fungsi untuk menghitung proporsi pengeluaran per layanan
    private static function hitungPengeluaran($penghasilan, $totalPengeluaran) {
        $totalPenghasilan = array_sum($penghasilan);
        $proporsiPengeluaran = [];
        
        foreach ($penghasilan as $layanan => $penghasilanLayanan) {
            if ($totalPenghasilan > 0) {
                $proporsiPengeluaran[$layanan] = ($penghasilanLayanan / $totalPenghasilan) * $totalPengeluaran;
            } else {
                $proporsiPengeluaran[$layanan] = 0;
            }
        }
        
        return $proporsiPengeluaran;
    }
}
