<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sparepart;

class SparepartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create seeder
        $sparepart = new Sparepart();
        $sparepart->name = 'LCD';
        $sparepart->price = '50000';
        $sparepart->description = 'Lorem ipsum dolor sit amet';
        $sparepart->image = 'jpg';
        $sparepart->stock = '100';
        $sparepart->quality = 'ori';
        $sparepart->save();

        // Create seeder
        $sparepart = new Sparepart();
        $sparepart->name = 'Baterai';
        $sparepart->price = '50000';
        $sparepart->description = 'Lorem ipsum dolor sit amet';
        $sparepart->image = 'jpg';
        $sparepart->stock = '100';
        $sparepart->quality = 'ori';
        $sparepart->save();

        // Create seeder
        $sparepart = new Sparepart();
        $sparepart->name = 'Keyboard';
        $sparepart->price = '50000';
        $sparepart->description = 'Lorem ipsum dolor sit amet';
        $sparepart->image = 'jpg';
        $sparepart->stock = '100';
        $sparepart->quality = 'ori';
        $sparepart->save();
    }
}
