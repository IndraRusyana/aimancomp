<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        // Create user Admin
        $admin = new Admin();
        $admin->name = 'Admin User 1';
        $admin->email = 'admin@mail.com';
        $admin->nik = '1122331';
        $admin->foto_ktp = 'img.jpg';
        $admin->no_hp = '0891234567';
        $admin->doc_mou = 'text.docx';
        $admin->save();

        $admin = new Admin();
        $admin->name = 'Admin User 2';
        $admin->email = 'admin2@mail.com';
        $admin->nik = '1122332';
        $admin->foto_ktp = 'img.jpg';
        $admin->no_hp = '0891234567';
        $admin->doc_mou = 'text.docx';
        $admin->save();

        $admin = new Admin();
        $admin->name = 'Admin User 3';
        $admin->email = 'admin3@mail.com';
        $admin->nik = '1122333';
        $admin->foto_ktp = 'img.jpg';
        $admin->no_hp = '0891234567';
        $admin->doc_mou = 'text.docx';
        $admin->save();
    }
}