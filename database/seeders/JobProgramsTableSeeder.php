<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobProgram;
use Carbon\Carbon;

class JobProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data bulan 7
        $data = new JobProgram();
        $data->nama_project = 'pembiatan aplikasi';
        $data->client = '';
        $data->harga = '250000';
        $data->deskripsi = '';
        $data->estimasi_waktu_pengerjaan = '';
        $data->input_dokumen = '';
        $data->status = 'selesai';
        $data->tanggal = "2024-07-06";
        $data->save();
    }
}
