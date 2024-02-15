<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'SuperAdmin',
                'email' => 'superadmin@turf.com',
                'password' => bcrypt('password'),
                'role' => 'super-admin',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@turf.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@turf.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
            ],
        ]);
    }
}
