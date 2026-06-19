<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'no_hp',
        'spesialis'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // DIPERBAIKI: dokter_id (bukan id_dokter) — sesuai JadwalPeriksaController & migration
    public function jadwalPeriksa()
    {
        return $this->hasMany(JadwalPeriksa::class, 'dokter_id');
    }
}