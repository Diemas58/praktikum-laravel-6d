<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $elektronik = Kategori::where('nama_kategori', 'Elektronik')->first();
        $atk = Kategori::where('nama_kategori', 'Alat Tulis')->first();
        $kantor = Kategori::where('nama_kategori', 'Kebutuhan Kantor')->first();

        $supplierTeknologi = Supplier::where('nama_supplier', 'CV Teknologi Banua')->first();
        $supplierAtk = Supplier::where('nama_supplier', 'Toko ATK Mandiri')->first();
        $supplierKantor = Supplier::where('nama_supplier', 'PT Kantor Nusantara')->first();

        $data = [
            ['nama_barang' => 'Laptop Asus VivoBook', 'harga' => 8500000, 'stok' => 8, 'kategori_id' => $elektronik?->id, 'supplier_id' => $supplierTeknologi?->id],
            ['nama_barang' => 'Mouse Wireless Logitech', 'harga' => 175000, 'stok' => 25, 'kategori_id' => $elektronik?->id, 'supplier_id' => $supplierTeknologi?->id],
            ['nama_barang' => 'Keyboard Mechanical', 'harga' => 450000, 'stok' => 12, 'kategori_id' => $elektronik?->id, 'supplier_id' => $supplierTeknologi?->id],
            ['nama_barang' => 'Pulpen Gel Hitam', 'harga' => 5000, 'stok' => 120, 'kategori_id' => $atk?->id, 'supplier_id' => $supplierAtk?->id],
            ['nama_barang' => 'Kertas HVS A4 80gsm', 'harga' => 65000, 'stok' => 40, 'kategori_id' => $kantor?->id, 'supplier_id' => $supplierKantor?->id],
        ];

        foreach ($data as $barang) {
            Barang::updateOrCreate(['nama_barang' => $barang['nama_barang']], $barang);
        }
    }
}
