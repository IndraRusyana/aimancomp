<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Joki;

class JokisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $joki = new Joki();
        $joki->name = 'Jurnal';
        $joki->price = '50000';
        $joki->description = 'Lorem ipsum dolor sit amet';
        $joki->save();

        // Create seeder
        $joki = new Joki();
        $joki->name = 'Skripsi';
        $joki->price = '50000';
        $joki->description = 'Lorem ipsum dolor sit amet';
        $joki->save();

        // Create seeder
        $joki = new Joki();
        $joki->name = 'Tugas';
        $joki->price = '50000';
        $joki->description = 'Lorem ipsum dolor sit amet';
        $joki->save();
    }
}
