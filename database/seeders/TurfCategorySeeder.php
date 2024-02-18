<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurfCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('turf_categories')->insert([
            [
                'category_name' => 'Cricket',
            ],
            [
                'category_name' => 'Football',
            ],
            [
                'category_name' => 'Badminton',
               
            ],
        ]);
    }
}
