<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Participant extends Model
{
// Kolom yang diizinkan untuk diisi mass-assignment
    protected $fillable = [
        'schedule_id',
        'event_id',
        'name',
        'email',
        'phone',
        'jenis_kelamin',
    ];

    // Accessor: ubah 'L'/'P' menjadi label lengkap saat dibaca
    protected function jenisKelamin(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === 'L' ? 'Laki-Laki' : 'Perempuan',
        );
    }

    public function participants()
    {
        return $this->hasMany(\App\Models\Participant::class, 'event_id');
    }

/**
     * Relasi balik ke Model Schedule
     */
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    /**
     * Relasi balik ke Model Event
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
?>