<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topup;

class TopupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topup = new Topup();
        $topup->name = 'Jurnal';
        $topup->price = '70000';
        $topup->save();

        // Create seeder
        $topup = new Topup();
        $topup->name = 'Skripsi';
        $topup->price = '50000';
        $topup->save();

        // Create seeder
        $topup = new Topup();
        $topup->name = 'Tugas';
        $topup->price = '30000';
        $topup->save();
    }
}
