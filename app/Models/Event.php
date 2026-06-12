<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'status',
    ];

    /**
     * Status otomatis berdasarkan tanggal event.
     * - upcoming: tanggal event > hari ini
     * - ongoing : tanggal event == hari ini
     * - ended   : tanggal event < hari ini
     */
    public function getComputedStatusAttribute(): string
    {
        $eventDate = Carbon::parse($this->date)->startOfDay();
        $today     = Carbon::now()->startOfDay();

        if ($eventDate->greaterThan($today)) {
            return 'upcoming';
        }

        if ($eventDate->equalTo($today)) {
            return 'ongoing';
        }

        return 'ended';
    }
}