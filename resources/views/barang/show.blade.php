@extends('layouts.admin')

@section('title', 'Detail Barang')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="m-0">Detail Barang</h1>
        <p class="text-muted mb-0">Informasi lengkap satu data barang.</p>
    </div>
    <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">{{ $barang->nama_barang }}</h3>
    </div>
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Kategori</dt>
            <dd class="col-sm-9">{{ $barang->kategori?->nama_kategori ?? '-' }}</dd>

            <dt class="col-sm-3">Supplier</dt>
            <dd class="col-sm-9">{{ $barang->supplier?->nama_supplier ?? '-' }}</dd>

            <dt class="col-sm-3">Harga</dt>
            <dd class="col-sm-9">Rp {{ number_format($barang->harga, 0, ',', '.') }}</dd>

            <dt class="col-sm-3">Stok</dt>
            <dd class="col-sm-9">{{ $barang->stok }}</dd>

            <dt class="col-sm-3">Status</dt>
            <dd class="col-sm-9">
                @if ($barang->stok > 0)
                    <span class="badge bg-success">Tersedia</span>
                @else
                    <span class="badge bg-danger">Habis</span>
                @endif
            </dd>
        </dl>
    </div>
    <div class="card-footer text-end">
        <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection
