@extends('layouts.main')

@section('title', 'Beranda Praktikum Laravel')

@section('content')
<div class="row align-items-center g-4">
    <div class="col-lg-7">
        <div class="p-4 p-md-5 bg-light rounded-3 shadow-sm">
            <h1 class="display-6 fw-bold mb-3">Aplikasi Inventaris Praktikum Laravel</h1>
            <p class="lead mb-4">
                Nama saya Diemas Gusfha Afrizal Faturrahim (2310010155), saya adalah mahasiswa dari jurusan Teknik Informatika Universitas Islam Kalimantan.
            </p>
            <a href="{{ route('barang.index') }}" class="btn btn-primary btn-lg">Buka Data Barang</a>
            <a href="{{ route('barang.create') }}" class="btn btn-outline-primary btn-lg ms-2">Tambah Barang</a>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-semibold">Rute Latihan</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action" href="{{ route('halo') }}">/halo</a>
                <a class="list-group-item list-group-item-action" href="{{ route('mahasiswa.show', 'Budi') }}">/mahasiswa</a>
                <a class="list-group-item list-group-item-action" href="{{ route('profil') }}">/profil</a>
                <a class="list-group-item list-group-item-action" href="{{ route('kalkulator', [10, 5]) }}">/kalkulator/10/5</a>
            </div>
        </div>
    </div>
</div>
@endsection
