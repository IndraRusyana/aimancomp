<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobTopup;

class JobTopupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topup = new JobTopup();
        $topup->provider = "-";
        $topup->modal = 30000;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-16";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "top up dana";
        $topup->modal = 100000;
        $topup->harga_jual = 103000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-17";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 30500;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 100500;
        $topup->harga_jual = 103000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 25000;
        $topup->harga_jual = 28000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 27000;
        $topup->harga_jual = 30000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 23000;
        $topup->harga_jual = 25000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 97500;
        $topup->harga_jual = 100000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-25";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 50000;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "tarik tunai dana";
        $topup->modal = 50000;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "tarik tunai dana";
        $topup->modal = 150000;
        $topup->harga_jual = 153000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 20000;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 60000;
        $topup->harga_jual = 63000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-29";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 50000;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-31";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 0;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-01";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 101000;
        $topup->harga_jual = 103000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 70500;
        $topup->harga_jual = 73000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 90000;
        $topup->harga_jual = 93000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-03";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "Tatik tunai dana";
        $topup->modal = 210000;
        $topup->harga_jual = 213000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-05";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "top up dana";
        $topup->modal = 30000;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-05";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 150000;
        $topup->harga_jual = 155000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-05";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 100000;
        $topup->harga_jual = 105000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-07";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 30000;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-07";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 30000;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-08";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 70000;
        $topup->harga_jual = 73000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-10";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 25000;
        $topup->harga_jual = 28000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-10";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 28000;
        $topup->harga_jual = 31000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-10";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 25500;
        $topup->harga_jual = 28000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-15";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 50000;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-19";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "ydana";
        $topup->modal = 30000;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 60000;
        $topup->harga_jual = 65000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-21";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 40000;
        $topup->harga_jual = 43000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 150000;
        $topup->harga_jual = 153000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 50000;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota 17gb";
        $topup->modal = 124300;
        $topup->harga_jual = 129000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota xl";
        $topup->modal = 34500;
        $topup->harga_jual = 39000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-03";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota indosat";
        $topup->modal = 23700;
        $topup->harga_jual = 25000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-03";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota";
        $topup->modal = 58300;
        $topup->harga_jual = 62000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-05";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota";
        $topup->modal = 22500;
        $topup->harga_jual = 24000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-18";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota";
        $topup->modal = 35550;
        $topup->harga_jual = 37000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-22";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota Indosat 10gb";
        $topup->modal = 47500;
        $topup->harga_jual = 50000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-30";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota";
        $topup->modal = 11700;
        $topup->harga_jual = 13000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-30";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik 20rb";
        $topup->modal = 20000;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-17";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-21";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20000;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20000;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "Listrik";
        $topup->modal = 52000;
        $topup->harga_jual = 0;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-28";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik 50";
        $topup->modal = 0;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-29";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20000;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-29";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20000;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-30";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 0;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-31";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20000;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-04";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-31";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-04";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 21500;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-06";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-07";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 50075;
        $topup->harga_jual = 52000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-10";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-15";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-18";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 52750;
        $topup->harga_jual = 55000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-22";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 22000;
        $topup->harga_jual = 0;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 22000;
        $topup->harga_jual = 0;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-29";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "-";
        $topup->modal = 10850;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "oman";
        $topup->modal = 20075;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "vocher";
        $topup->modal = 13000;
        $topup->harga_jual = 15000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-28";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "tarik tunai Shopee pay";
        $topup->modal = 100000;
        $topup->harga_jual = 103000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa 15k";
        $topup->modal = 14800;
        $topup->harga_jual = 17000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-17";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa 15k";
        $topup->modal = 14800;
        $topup->harga_jual = 17000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-19";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa 10k";
        $topup->modal = 49800;
        $topup->harga_jual = 52000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-19";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa 50k";
        $topup->modal = 49800;
        $topup->harga_jual = 52000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 24800;
        $topup->harga_jual = 27000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 5250;
        $topup->harga_jual = 7000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-21";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10050;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-23";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10050;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-23";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa 15k";
        $topup->modal = 14910;
        $topup->harga_jual = 17000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-23";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 49705;
        $topup->harga_jual = 52000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-26";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 15990;
        $topup->harga_jual = 17000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-27";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 64950;
        $topup->harga_jual = 67000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 49705;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10865;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa 50";
        $topup->modal = 50500;
        $topup->harga_jual = 52000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-04";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 11000;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-04";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10350;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-04";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10350;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-04";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 99500;
        $topup->harga_jual = 102000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-05";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 29800;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 5075;
        $topup->harga_jual = 7000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 49075;
        $topup->harga_jual = 50000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-27";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10075;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-30";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "transfer bca";
        $topup->modal = 70000;
        $topup->harga_jual = 75000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-05-28";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "transfer bri";
        $topup->modal = 75000;
        $topup->harga_jual = 80000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-06-19";
        $topup->save();

        // data bulan 7
        $topup = new JobTopup();
        $topup->provider = "-";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-08";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "PAKET KOUTA";
        $topup->modal = 20000;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-18";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "tf bri";
        $topup->modal = 122500;
        $topup->harga_jual = 125000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-24";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 50000;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 50000;
        $topup->harga_jual = 53000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "dana";
        $topup->modal = 30000;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-18";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "tarik tunai dana";
        $topup->modal = 100000;
        $topup->harga_jual = 103000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "DANA";
        $topup->modal = 110000;
        $topup->harga_jual = 113000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-22";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota";
        $topup->modal = 38000;
        $topup->harga_jual = 43000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-06";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "kuota xl bang fahmi";
        $topup->modal = 2813;
        $topup->harga_jual = 4000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-22";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-06";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-09";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "Listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-15";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "LISTRIK TOKEN";
        $topup->modal = 100075;
        $topup->harga_jual = 102000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-16";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-15";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "listrik";
        $topup->modal = 20075;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-21";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 19750;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-02";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10775;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-03";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 5900;
        $topup->harga_jual = 7000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-09";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "HAJI OMAN PULSA 45.000";
        $topup->modal = 46000;
        $topup->harga_jual = 50000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-18";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "PULSA";
        $topup->modal = 29750;
        $topup->harga_jual = 33000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-20";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "PULSA TETEH";
        $topup->modal = 19775;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-22";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa";
        $topup->modal = 10135;
        $topup->harga_jual = 12000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-22";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa teteh";
        $topup->modal = 19775;
        $topup->harga_jual = 22000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-27";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "pulsa 17rb";
        $topup->modal = 14780;
        $topup->harga_jual = 17000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-28";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "token Oman";
        $topup->modal = 20075;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-27";
        $topup->save();

        $topup = new JobTopup();
        $topup->provider = "token Oman";
        $topup->modal = 20075;
        $topup->harga_jual = 23000;
        $topup->nomor_konsumen = ''; // Tambahkan nomor konsumen jika diperlukan
        $topup->status = 'selesai';
        $topup->tanggal = "2024-07-27";
        $topup->save();


    }
}
