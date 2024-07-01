<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobDrink;
use Carbon\Carbon;

class JobDrinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $names = ['Kopi Hitam', 'Teh Tarik', 'Es Jeruk', 'Susu Coklat'];
        $modals = [3000, 4000, 5000, 6000];

        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $beverage = new JobDrink();
                $beverage->nama = $faker->randomElement($names);
                $beverage->modal = $faker->randomElement($modals);
                $beverage->harga_jual = $beverage->modal + 2000;
                $beverage->tanggal = Carbon::now()->subDays($i)->format('Y-m-d H:i:s');
                $beverage->save();
            }
        }
    }
}
