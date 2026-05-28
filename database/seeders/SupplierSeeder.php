<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_supplier' => 'CV Teknologi Banua', 'alamat' => 'Jl. A. Yani Km. 5, Banjarmasin'],
            ['nama_supplier' => 'Toko ATK Mandiri', 'alamat' => 'Jl. Pangeran Antasari, Banjarmasin'],
            ['nama_supplier' => 'PT Kantor Nusantara', 'alamat' => 'Jl. Trikora, Banjarbaru'],
        ];

        foreach ($data as $supplier) {
            Supplier::firstOrCreate(['nama_supplier' => $supplier['nama_supplier']], $supplier);
        }
    }
}
