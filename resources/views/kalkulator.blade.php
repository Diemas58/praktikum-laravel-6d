@extends('layouts.main')

@section('title', 'Kalkulator Sederhana')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h1 class="h4 mb-3">Latihan Route Kalkulator</h1>
        <p>Angka pertama: <strong>{{ $angka1 }}</strong></p>
        <p>Angka kedua: <strong>{{ $angka2 }}</strong></p>
        <div class="alert alert-info mb-0">
            Hasil penjumlahan: <strong>{{ $hasil }}</strong>
        </div>
    </div>
</div>
@endsection
