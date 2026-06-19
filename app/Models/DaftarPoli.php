<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarPoli extends Model
{
    protected $table = 'daftar_poli';

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'jadwal_periksa_id',
        'keluhan',
        'status',
        'no_antrian',
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function jadwalPeriksa()
    {
        return $this->belongsTo(JadwalPeriksa::class, 'jadwal_periksa_id');
    }

    // DIPERBAIKI: id_daftar_poli (bukan daftar_poli_id) — sesuai model & migration Periksa
    public function periksa()
    {
        return $this->hasOne(Periksa::class, 'id_daftar_poli');
    }
}