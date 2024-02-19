<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurfScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('turf_schedules')->insert([
            [
                'turf_category_id'  => '1',
                'shift_name'        => 'Morning',
                'start_time'        => '06:00:00',
                'end_time'          => '08:00:00',
                'booking_price'     => '500',
                'price'             => '1500',
            ],
            [
                'turf_category_id'  => '2',
                'shift_name'        => 'Morning',
                'start_time'        => '06:00:00',
                'end_time'          => '08:00:00',
                'booking_price'     => '500',
                'price'             => '1500',
            ],
            [
                'turf_category_id'  => '3',
                'shift_name'        => 'Morning',
                'start_time'        => '06:00:00',
                'end_time'          => '08:00:00',
                'booking_price'     => '500',
                'price'             => '1500',
               
            ],
        ]);
    }
}
