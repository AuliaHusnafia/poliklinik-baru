<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run(): void
    {
        Obat::create([
            'nama_obat' => 'insto',
            'kemasan' => 'tube',
            'harga' => 20000,
            'stok' => 10,
        ]);

        Obat::create([
            'nama_obat' => 'paracetamol',
            'kemasan' => 'tablet',
            'harga' => 15000,
            'stok' => 8,
        ]);

        Obat::create([
            'nama_obat' => 'antasida',
            'kemasan' => 'tablet',
            'harga' => 13000,
            'stok' => 4,
        ]);
    }
}