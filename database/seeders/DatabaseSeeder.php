<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
    //     // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }

    use WithoutModelEvents;

    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ServicesTableSeeder::class,
            SparepartsTableSeeder::class,
            ProgramsTableSeeder::class,
            JokisTableSeeder::class,
            TopupsTableSeeder::class,
            DrinksTableSeeder::class,
            AdminsTableSeeder::class,
            InvestorsTableSeeder::class,
            OwnersTableSeeder::class,
            JobServiceTableSeeder::class,
            JobSparepartsTableSeeder::class,
            JobProgramsTableSeeder::class,
            JobJokisTableSeeder::class,
            JobTopupsTableSeeder::class,
            JobDrinksTableSeeder::class,
        ]);
    }
}
