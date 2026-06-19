<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats'; 
    
    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga',
        'stok'
    ];

    public function isStokHabis(): bool
    {
        return $this->stok <= 0;
    }

    public function isStokMenipis(): bool
    {
        return $this->stok > 0 && $this->stok < 5;
    }

    public function kurangiStok(int $jumlah): bool
    {
        if ($this->stok >= $jumlah) {
            $this->stok -= $jumlah;
            $this->save();
            return true;
        }
        return false;
    }

    public function tambahStok(int $jumlah): void
    {
        $this->stok += $jumlah;
        $this->save();
    }
}