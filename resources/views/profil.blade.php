@extends('layouts.main')

@section('title', 'Profil Pengguna')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-body">
        <h1 class="h3 mb-3">Profil Pengguna</h1>
        <p class="mb-1"><strong>Nama:</strong> {{ $nama_user }}</p>
        <p class="mb-0"><strong>Status:</strong> Aktif</p>
    </div>
</div>
@endsection
