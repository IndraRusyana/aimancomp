<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create seeder
        $service = new Service();
        $service->name = 'Pasang LCD';
        $service->price = '50000';
        $service->description = 'Lorem ipsum dolor sit amet';
        $service->save();

        // Create seeder
        $service = new Service();
        $service->name = 'Pasang LCD 2';
        $service->price = '100000';
        $service->description = 'Lorem ipsum dolor sit amet';
        $service->save();

        // Create seeder
        $service = new Service();
        $service->name = 'Pasang LCD 3';
        $service->price = '1000000';
        $service->description = 'Lorem ipsum dolor sit amet';
        $service->save();
    }
}
