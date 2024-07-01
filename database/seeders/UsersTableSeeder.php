<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $admin = new User();
        $admin->name = 'Admin User 1';
        $admin->email = 'admin@mail.com';
        $admin->nik = '1122331';
        $admin->password = bcrypt('password');
        $admin->role = 'admin';
        $admin->save();

        $admin = new User();
        $admin->name = 'Admin User 2';
        $admin->email = 'admin2@mail.com';
        $admin->nik = '1122332';
        $admin->password = bcrypt('password');
        $admin->role = 'admin';
        $admin->save();

        $admin = new User();
        $admin->name = 'Admin User 3';
        $admin->email = 'admin3@mail.com';
        $admin->nik = '1122333';
        $admin->password = bcrypt('password');
        $admin->role = 'admin';
        $admin->save();

        // Create owner user
        $owner = new User();
        $owner->name = 'Owner User';
        $owner->email = 'owner@mail.com';
        $owner->nik = '1122334';
        $owner->password = bcrypt('password');
        $owner->role = 'owner';
        $owner->save();

        // Create owner user
        $investor = new User();
        $investor->name = 'Investor User';
        $investor->email = 'investor@mail.com';
        $investor->nik = '1122335';
        $investor->password = bcrypt('password');
        $investor->role = 'investor';
        $investor->save();

        $investor = new User();
        $investor->name = 'Investor User 2';
        $investor->email = 'investor2@mail.com';
        $investor->nik = '1122336';
        $investor->password = bcrypt('password');
        $investor->role = 'investor';
        $investor->save();

        $investor = new User();
        $investor->name = 'Investor User 3';
        $investor->email = 'investor3@mail.com';
        $investor->nik = '1122337';
        $investor->password = bcrypt('password');
        $investor->role = 'investor';
        $investor->save();
    }
}