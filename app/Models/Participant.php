<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Participant extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'jenis_kelamin',  // nilai di DB: 'L' atau 'P'
    ];

    // Accessor: ubah 'L'/'P' menjadi label lengkap saat dibaca
    protected function jenisKelamin(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === 'L' ? 'Laki-Laki' : 'Perempuan',
        );
    }
}
?>