<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Drink;

class DrinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drink = new Drink();
        $drink->name = 'Kopi';
        $drink->price = '70000';
        $drink->save();

        // Create seeder
        $drink = new Drink();
        $drink->name = 'kopi';
        $drink->price = '50000';
        $drink->save();

        // Create seeder
        $drink = new Drink();
        $drink->name = 'susu';
        $drink->price = '30000';
        $drink->save();
    }
}
