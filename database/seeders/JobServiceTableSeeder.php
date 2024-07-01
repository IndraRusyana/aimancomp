<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobService;
use Carbon\Carbon;

class JobServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $statuses = ['pending', 'proses', 'selesai'];
        $harga = [50000, 100000, 200000, 500000, 1000000, 2000000];

        $startDate = Carbon::create(2024, 5, 1); // 1st May 2024
        $endDate = Carbon::create(2024, 6, 30); // 30th June 2024

        $date = $startDate->copy();
        while ($date->lte($endDate)) {
            for ($j = 0; $j < 2; $j++) {
                $jobService = new JobService();
                $jobService->gambar = $faker->image('public/assets/img/uploads', 640, 480, null, false);
                $jobService->merk = $faker->company;
                $jobService->kondisi_masuk = $faker->sentence;
                $jobService->keluhan = $faker->sentence;
                $jobService->solusi = $faker->sentence;
                $jobService->status = $faker->randomElement($statuses);
                $jobService->harga = $faker->randomElement($harga);
                $jobService->tanggal = $date->format('Y-m-d H:i:s');
                $jobService->save();
            }
            $date->addDay(); // Move to the next day
        }
    }
}
