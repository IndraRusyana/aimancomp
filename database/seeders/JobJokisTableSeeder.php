<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobJoki;
use Carbon\Carbon;

class JobJokisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = new JobJoki();
        $data->nama_tugas = 'joki bab 4';
        $data->client = '';
        $data->harga = '300000';
        $data->deskripsi = '';
        $data->estimasi_pengerjaan = '';
        $data->status = 'selesai';
        $data->tanggal = "2024-05-27";
        $data->save();

        $data = new JobJoki();
        $data->nama_tugas = 'joki tugas';
        $data->client = '';
        $data->harga = '60000';
        $data->deskripsi = '';
        $data->estimasi_pengerjaan = '';
        $data->status = 'selesai';
        $data->tanggal = "2024-06-03";
        $data->save();

        $data = new JobJoki();
        $data->nama_tugas = 'joki';
        $data->client = '';
        $data->harga = '400000';
        $data->deskripsi = '';
        $data->estimasi_pengerjaan = '';
        $data->status = 'selesai';
        $data->tanggal = "2024-06-27";
        $data->save();

        // data bulan 7
        $data = new JobJoki();
        $data->nama_tugas = 'joki TA';
        $data->client = '';
        $data->harga = '700000';
        $data->deskripsi = '';
        $data->estimasi_pengerjaan = '';
        $data->status = 'selesai';
        $data->tanggal = "2024-07-06";
        $data->save();

    }
}
