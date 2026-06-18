<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// PASTIKAN BARIS DI BAWAH INI TERTULIS DENGAN BENAR:
use Illuminate\Database\Eloquent\Relations\HasMany; 
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

    /**
     * Hubungan ke data Partisipan yang mendaftar Event ini
     */
    public function participants(): HasMany
    {
        return $this->hasMany(\App\Models\Participant::class, 'event_id');
    }
}