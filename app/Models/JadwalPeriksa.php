<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    use HasFactory;

    protected $table = 'jadwal_periksa';

    // PERBAIKAN: Wajib masukkan dokter_id di sini agar diizinkan masuk ke database
    protected $fillable = [
        'dokter_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }
}