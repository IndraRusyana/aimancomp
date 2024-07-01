<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create seeder
        $program = new Program();
        $program->name = 'Ecommerce';
        $program->price = '50000';
        $program->description = 'Lorem ipsum dolor sit amet';
        $program->save();

        // Create seeder
        $program = new Program();
        $program->name = 'Portfolio';
        $program->price = '50000';
        $program->description = 'Lorem ipsum dolor sit amet';
        $program->save();

        // Create seeder
        $program = new Program();
        $program->name = 'Landing Page';
        $program->price = '50000';
        $program->description = 'Lorem ipsum dolor sit amet';
        $program->save();
    }
}
