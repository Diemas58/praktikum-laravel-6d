# Praktikum Laravel - Revisi Sesuai Panduan

Project ini sudah direvisi agar mengikuti panduan praktikum Laravel 2026:

- Routing dasar: `/`, `/halo`, `/mahasiswa/{nama}`, `/profil`, dan `/kalkulator/{angka1}/{angka2}`.
- Controller `BarangController` dengan alur Route -> Controller -> View.
- Blade layouting: `layouts/main.blade.php` dan `layouts/admin.blade.php`.
- Migration database: `kategoris`, `suppliers`, `barangs`, dan penambahan `supplier_id` pada `barangs`.
- Seeder: `KategoriSeeder`, `SupplierSeeder`, dan `BarangSeeder`.
- Eloquent ORM dan relasi one-to-many: `Kategori -> Barang`, `Supplier -> Barang`, `Barang -> Kategori`, `Barang -> Supplier`.
- CRUD lengkap barang: index, create, store, show, edit, update, destroy.
- Validasi form, CSRF protection, method spoofing `PUT/DELETE`, old input, dan flash message.
- Tampilan AdminLTE-style untuk halaman data barang dengan aset lokal di `public/adminlte`.

## Cara Menjalankan

1. Ekstrak folder project.
2. Buka terminal di folder project:

```bash
cd praktikum-laravel
```

3. Buat database MySQL kosong di PHPMyAdmin:

```text
db_praktikum_laravel
```

4. Sesuaikan `.env` bila username/password MySQL berbeda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_praktikum_laravel
DB_USERNAME=root
DB_PASSWORD=
```

5. Jalankan migration dan seeder:

```bash
php artisan migrate:fresh --seed
```

6. Instal aset frontend dan jalankan Vite:

```bash
npm install
npm run dev
```

7. Buka terminal kedua lalu jalankan Laravel:

```bash
php artisan serve
```

8. Akses aplikasi:

```text
http://127.0.0.1:8000
http://127.0.0.1:8000/barang
```

## Catatan AdminLTE

Folder `public/adminlte` sudah disiapkan agar struktur asset() pada layout AdminLTE tidak error. Jika ingin memakai AdminLTE asli secara penuh, unduh AdminLTE v3.2.0, lalu salin folder `dist` dan `plugins` ke `public/adminlte/` sesuai panduan praktikum.
