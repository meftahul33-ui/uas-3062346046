<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    protected $fillable = [
        'nama',
        'nim',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'riwayat_pendidikan',
        'hobby',
        'alamat_web',
        'deskripsi_diri',
        'foto',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'riwayat_pendidikan' => 'array',
        'tanggal_lahir' => 'date',
    ];
}
