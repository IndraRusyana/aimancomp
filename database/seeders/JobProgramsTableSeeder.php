<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobProgram;
use Carbon\Carbon;

class JobProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $projects = ['Website E-commerce', 'Mobile App', 'Company Profile', 'ERP System'];
        $clients = ['PT. ABC', 'CV. XYZ', 'PT. JKL', 'CV. MNO'];
        $prices = [5000000, 1000000, 4000000, 2000000];
        $estimations = ['1 bulan', '2 bulan', '3 bulan', '4 bulan'];
        $documents = ['specifications.pdf', 'requirements.pdf', 'scope_of_work.pdf'];
        $statuses = ['pending', 'proses', 'selesai'];
    
        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $project = new JobProgram();
                $project->nama_project = $faker->randomElement($projects);
                $project->client = $faker->randomElement($clients);
                $project->harga = $faker->randomElement($prices);
                $project->deskripsi = $faker->sentence;
                $project->estimasi_waktu_pengerjaan = $faker->randomElement($estimations);
                $project->input_dokumen = $faker->randomElement($documents);
                $project->status = $faker->randomElement($statuses);
                $project->tanggal = Carbon::now()->subDays($i)->format('Y-m-d H:i:s');
                $project->save();
            }
        }
    }
}
