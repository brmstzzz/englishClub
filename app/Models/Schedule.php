<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Schedule extends Model
{
    protected $fillable = [
        'title',
        'day',
        'time',
        'activity',
        'status',
    ];

    protected $durationHours = 2;

    /**
     * Status otomatis berdasarkan tanggal & jam mulai kegiatan.
     */
    public function getComputedStatusAttribute(): string
    {
        $start = Carbon::parse($this->day . ' ' . $this->time);
        $end   = $start->copy()->addHours($this->durationHours);

        $now = Carbon::now();

        if ($now->lessThan($start)) {
            return 'upcoming';
        }

        if ($now->between($start, $end)) {
            return 'ongoing';
        }

        return 'ended';
    }

    /**
     * Hubungan ke data Partisipan yang mendaftar Schedule ini
     */
    public function participants(): HasMany
    {
        // Diubah dari 'event_id' menjadi 'schedule_id'
        return $this->hasMany(\App\Models\Participant::class, 'schedule_id');
    }
}