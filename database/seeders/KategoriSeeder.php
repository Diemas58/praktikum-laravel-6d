<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Elektronik', 'Alat Tulis', 'Kebutuhan Kantor'] as $namaKategori) {
            Kategori::firstOrCreate(['nama_kategori' => $namaKategori]);
        }
    }
}
