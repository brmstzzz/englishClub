<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        Schedule::insert([
            [
                'title'      => 'Weekly Training',
                'day'        => '2026-06-19',
                'time'       => '15:00:00',
                'activity'   => 'Public Speaking Practice',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Monthly Workshop',
                'day'        => '2026-06-28',
                'time'       => '09:00:00',
                'activity'   => 'Writing & Grammar Intensive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}