<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
})->name('home');

Route::get('/halo', function () {
    return 'Halo! Selamat datang di Praktikum Laravel pertama Anda.';
})->name('halo');

Route::get('/mahasiswa/{nama}', function (string $nama) {
    return 'Selamat datang, Mahasiswa: ' . e($nama);
})->name('mahasiswa.show');

Route::get('/profil', function () {
    return view('profil', ['nama_user' => 'Diemas Gusfha Afrizal Faturrahim']);
})->name('profil');

Route::get('/kalkulator/{angka1}/{angka2}', function ($angka1, $angka2) {
    if (! is_numeric($angka1) || ! is_numeric($angka2)) {
        abort(404, 'Parameter kalkulator harus berupa angka.');
    }

    $hasil = $angka1 + $angka2;

    return view('kalkulator', compact('angka1', 'angka2', 'hasil'));
})->name('kalkulator');

Route::get('/barang/detail/{nama}', [BarangController::class, 'detail'])->name('barang.detail');
Route::get('/kategori/{kategori}', [BarangController::class, 'kategori'])->name('kategori.barang');
Route::resource('barang', BarangController::class);
