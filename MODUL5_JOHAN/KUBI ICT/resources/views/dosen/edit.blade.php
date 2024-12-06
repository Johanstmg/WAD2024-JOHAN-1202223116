@extends('layout.app')

@section('title', 'Edit Dosen')

@section('content')
<h1>Edit Dosen</h1>
<form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="kode_dosen" class="form-label">Kode Dosen</label>
        <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="{{ $dosen->kode_dosen }}" required>
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="{{ $dosen->nama_dosen }}" required>
    </div>
    <div class="mb-3">
        <label for="nip" class="form-label">NIP</label>
        <input type="text" class="form-control" id="nip" name="nip" value="{{ $dosen->nip }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $dosen->email }}" required>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">No. Telepon</label>
        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $dosen->no_telepon }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
