<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobSparepart;
use Carbon\Carbon;

class JobSparepartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $qualities = ['Baru', 'Bekas'];
        $initialPrices = [350000, 400000, 450000, 500000];
        $quantities = [5, 10, 15, 20];
    
        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $jobSparepart = new JobSparepart();
                $jobSparepart->gambar = $faker->image('public/assets/img/uploads', 640, 480, null, false);
                $jobSparepart->nama = $faker->word . ' ' . $faker->word;
                $jobSparepart->harga_awal = $faker->randomElement($initialPrices);
                $jobSparepart->harga_jual = $jobSparepart->harga_awal + 25000;
                $jobSparepart->kualitas = $faker->randomElement($qualities);
                $jobSparepart->jumlah = $faker->randomElement($quantities);
                $jobSparepart->tanggal = Carbon::now()->subDays($i)->format('Y-m-d H:i:s');
                $jobSparepart->save();
            }
        }
    }
}
