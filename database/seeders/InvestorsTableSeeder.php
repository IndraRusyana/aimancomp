<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Investor;

class InvestorsTableSeeder extends Seeder
{
    public function run()
    {
        // Create user Investor
        $investor = new Investor();
        $investor->name = 'Investor User';
        $investor->email = 'investor@mail.com';
        $investor->nik = '1122335';
        $investor->foto_ktp = 'img.jpg';
        $investor->no_hp = '0891234567';
        $investor->jml_investasi = '350000';
        $investor->prsnt_investasi = '40';
        $investor->doc_mou = 'text.docx';
        $investor->save();

        $investor = new Investor();
        $investor->name = 'Investor User 2';
        $investor->email = 'investor2@mail.com';
        $investor->nik = '1122336';
        $investor->foto_ktp = 'img.jpg';
        $investor->no_hp = '0891234567';
        $investor->jml_investasi = '250000';
        $investor->prsnt_investasi = '30';
        $investor->doc_mou = 'text.docx';
        $investor->save();

        $investor = new Investor();
        $investor->name = 'Investor User 3';
        $investor->email = 'investor3@mail.com';
        $investor->nik = '1122337';
        $investor->foto_ktp = 'img.jpg';
        $investor->no_hp = '0891234567';
        $investor->jml_investasi = '150000';
        $investor->prsnt_investasi = '20';
        $investor->doc_mou = 'text.docx';
        $investor->save();
    }
}