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
        $faker = \Faker\Factory::create();
        $tasks = ['Skripsi Manajemen', 'Tesis Akuntansi', 'Disertasi Teknik', 'Makalah Hukum'];
        $clients = ['John Doe', 'Jane Smith', 'Alice Johnson', 'Bob Brown'];
        $prices = [3000000, 500000, 700000, 1000000];
        $estimations = ['1 bulan', '2 bulan', '3 bulan', '4 bulan'];
        $statuses = ['pending', 'proses', 'selesai'];

        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $task = new JobJoki();
                $task->nama_tugas = $faker->randomElement($tasks);
                $task->client = $faker->randomElement($clients);
                $task->harga = $faker->randomElement($prices);
                $task->deskripsi = $faker->sentence;
                $task->estimasi_pengerjaan = $faker->randomElement($estimations);
                $task->status = $faker->randomElement($statuses);
                $task->tanggal = Carbon::now()->subDays($i)->format('Y-m-d H:i:s');
                $task->save();
            }
        }
    }
}
