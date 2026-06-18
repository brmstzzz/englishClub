<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::insert([
            [
                'title'       => 'Weekly Discussion Circles',
                'description' => 'Dive into trending topics, global news, and creative debates. These sessions are designed to get you comfortable speaking on your feet in a relaxed, low pressure environment.',
                'date'        => '2026-05-15',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Interactive Game & Movie Nights',
                'description' => 'Who says learning can\'t be fun? Join us for trivia, collaborative board games, and movie screenings followed by casual critiques.',
                'date'        => '2026-06-01',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'title'       => 'Cultural Exchange Sessions',
                'description' => 'Perfecting your presentation skills, mastering professional email etiquette, or sharpening your public speaking — our focused workshops target the areas you need most.',
                'date'        => '2026-06-20',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}