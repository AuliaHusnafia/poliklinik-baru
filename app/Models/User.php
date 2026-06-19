<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'nama',
    'email',
    'password',
    'role',
    'alamat',
    'no_ktp',
    'no_hp',
    'no_rm',
    'id_poli', // ← tambahkan ini
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Mengaktifkan hashing otomatis bawaan Laravel Modern
        ];
    }

    /**
     * Relasi ke Poli
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    /**
     * Relasi ke Jadwal Periksa (untuk user yang berperan sebagai dokter)
     */
    public function jadwalPeriksa()
    {
        // PERBAIKAN: Disamakan menggunakan 'dokter_id' sesuai cetakan database kamu
        return $this->hasMany(JadwalPeriksa::class, 'dokter_id');
    }

    /**
     * Relasi ke Dokter
     */
    public function dokter()
    {
        return $this->hasOne(Dokter::class, 'user_id');
    }

    /**
     * Relasi ke Pasien
     */
    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'user_id');
    }
}