<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Owner;

class OwnersTableSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $owner = new Owner();
        $owner->name = 'Owner User';
        $owner->email = 'owner@mail.com';
        $owner->nik = '1122334';
        $owner->save();
    }
}