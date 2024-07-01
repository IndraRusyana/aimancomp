<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobTopup;
use Carbon\Carbon;

class JobTopupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $providers = ['GoPay', 'OVO', 'Dana', 'LinkAja'];
        $modalPrices = [50000, 75000, 95000, 100000];
        $statuses = ['Pending', 'Proses', 'Selesai'];

        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $topup = new JobTopup();
                $topup->provider = $faker->randomElement($providers);
                $topup->modal = $faker->randomElement($modalPrices);
                $topup->harga_jual = $topup->modal + 2000;
                $topup->nomor_konsumen = $faker->phoneNumber;
                $topup->status = $faker->randomElement($statuses);
                $topup->tanggal = Carbon::now()->subDays($i)->format('Y-m-d H:i:s');
                $topup->save();
            }
        }
    }
}
