@extends('layout.app')

@section('title', 'Tambah/Edit Dosen')

@section('content')
<h1>{{ isset($dosen) ? 'Edit Dosen' : 'Tambah Dosen' }}</h1>
<form action="{{ isset($dosen) ? route('dosen.update', $dosen->id) : route('dosen.store') }}" method="POST">
    @csrf
    @if(isset($dosen)) @method('PUT') @endif
    <div class="mb-3">
        <label>Kode Dosen</label>
        <input type="text" name="kode_dosen" class="form-control" value="{{ $dosen->kode_dosen ?? '' }}">
    </div>
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama_dosen" class="form-control" value="{{ $dosen->nama_dosen ?? '' }}">
    </div>
    <div class="mb-3">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ $dosen->nip ?? '' }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $dosen->email ?? '' }}">
    </div>
    <div class="mb-3">
        <label>Telepon</label>
        <input type="text" name="no_telepon" class="form-control" value="{{ $dosen->no_telepon ?? '' }}">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection