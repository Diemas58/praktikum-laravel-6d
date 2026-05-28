@extends('layouts.admin')

@section('title', 'Data Barang')

@section('content_header')
<div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
    <div>
        <h1 class="m-0">Data Barang</h1>
        <p class="text-muted mb-0">
            @if ($filterKategori)
                Menampilkan barang pada kategori: <strong>{{ $filterKategori->nama_kategori }}</strong>
            @else
                Daftar semua barang.
            @endif
        </p>
    </div>
    <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
</div>
@endsection

@section('content')
<div class="row g-3 mb-3">
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_barang }}</h3>
                <p>Total Barang</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total_stok }}</h3>
                <p>Total Stok</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $total_kategori }}</h3>
                <p>Kategori</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total_supplier }}</h3>
                <p>Supplier</p>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary card-outline">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h3 class="card-title mb-0">Tabel Barang</h3>
        <div class="btn-group flex-wrap">
            <a href="{{ route('barang.index') }}" class="btn btn-sm btn-outline-secondary">Semua</a>
            @foreach ($kategoris as $kategori)
                <a href="{{ route('kategori.barang', $kategori) }}" class="btn btn-sm btn-outline-secondary">
                    {{ $kategori->nama_kategori }}
                </a>
            @endforeach
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 60px">No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Supplier</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th style="width: 210px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data_barang as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori?->nama_kategori ?? '-' }}</td>
                        <td>{{ $barang->supplier?->nama_supplier ?? '-' }}</td>
                        <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>
                            @if ($barang->stok > 0)
                                <span class="badge bg-success">Tersedia</span>
                            @else
                                <span class="badge bg-danger">Habis</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1 flex-wrap">
                                <a href="{{ route('barang.show', $barang) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('barang.edit', $barang) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusBarang{{ $barang->id }}">
                                    Hapus
                                </button>
                            </div>

                            <div class="modal fade" id="hapusBarang{{ $barang->id }}" tabindex="-1" aria-labelledby="hapusBarangLabel{{ $barang->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusBarangLabel{{ $barang->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin menghapus barang <strong>{{ $barang->nama_barang }}</strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('barang.destroy', $barang) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
