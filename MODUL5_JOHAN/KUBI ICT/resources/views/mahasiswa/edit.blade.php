@extends('layout.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<h1>Edit Data Mahasiswa</h1>
<form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
    </div>
    <div class="mb-3">
        <label for="nama_mahasiswa" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}" required>
    </div>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" required>
    </div>
    <div class="mb-3">
        <label for="dosen_wali" class="form-label">Dosen Wali</label>
        <select name="dosen_id" id="dosen_wali" class="form-control" required>
            @foreach($dosen as $lecture)
            <option value="{{ $lecture->id }}" {{ $mahasiswa->dosen_id == $lecture->id ? 'selected' : '' }}>{{ $lecture->nama_dosen}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
