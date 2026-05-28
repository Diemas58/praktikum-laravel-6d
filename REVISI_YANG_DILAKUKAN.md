# Ringkasan Revisi Project

1. Memperbaiki namespace controller pada `routes/web.php` dari `app\Http\Controllers` menjadi `App\Http\Controllers`.
2. Menambahkan route latihan dasar sesuai sesi 1.
3. Menambahkan view `beranda.blade.php`, `profil.blade.php`, dan `kalkulator.blade.php`.
4. Menambahkan layout Bootstrap `resources/views/layouts/main.blade.php`.
5. Menambahkan model `Kategori`, `Supplier`, dan `Barang`.
6. Menambahkan migration `kategoris`, `barangs`, `suppliers`, serta `add_supplier_id_to_barangs_table`.
7. Menambahkan seeder kategori, supplier, dan barang contoh.
8. Mengubah `BarangController` menjadi resource controller lengkap CRUD.
9. Menambahkan view CRUD barang: index, create, edit, show, detail.
10. Menambahkan validasi unik nama barang, validasi harga/stok, CSRF, method spoofing, dan flash message.
11. Menambahkan layout AdminLTE-style `resources/views/layouts/admin.blade.php`.
12. Menambahkan aset lokal `public/adminlte` agar pemanggilan `asset()` sesuai panduan.
13. Mengubah konfigurasi `.env` ke MySQL `db_praktikum_laravel`, serta session/cache/queue ke mode sederhana untuk praktikum lokal.
14. Menambahkan Bootstrap dan Popper pada `package.json` untuk integrasi Vite.
