<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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

    /**
     * Durasi default kegiatan (jam). Sesuaikan jika perlu.
     */
    protected $durationHours = 2;

    /**
     * Status otomatis berdasarkan tanggal & jam mulai kegiatan.
     * - upcoming: belum dimulai
     * - ongoing : sedang berlangsung (start <= now < end)
     * - ended   : sudah selesai
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
}