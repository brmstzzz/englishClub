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
                'day'        => 'Thursday',
                'time'       => '15:00:00',
                'activity'   => 'Public Speaking Practice',
                'status'     => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title'      => 'Monthly Workshop',
                'day'        => 'Saturday',
                'time'       => '09:00:00',
                'activity'   => 'Writing & Grammar Intensive',
                'status'     => 'upcoming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}