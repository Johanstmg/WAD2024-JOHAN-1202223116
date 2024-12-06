@extends('layout.app')

@section('title', 'Tambah/Edit Mahasiswa')

@section('content')
<h1>{{ isset($mahasiswa) ? 'Edit Mahasiswa' : 'Tambah Mahasiswa' }}</h1>
<form action="{{ isset($mahasiswa) ? route('mahasiswa.update', $mahasiswa->id) : route('mahasiswa.store') }}" method="POST">
    @csrf
    @if(isset($mahasiswa)) @method('PUT') @endif

    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" id="nim" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim ?? '') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="nama_mahasiswa" class="form-label">Nama</label>
        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa ?? '') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $mahasiswa->email ?? '') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" id="jurusan" name="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan ?? '') }}" required>
    </div>
    
    <div class="mb-3">
        <label for="dosen_id" class="form-label">Dosen Wali</label>
        <select id="dosen_id" name="dosen_id" class="form-select" required>
            <option value="" disabled selected>-- Pilih Dosen Wali --</option>
            @foreach($dosen as $lecture)
                <option value="{{ $lecture->id }}" 
                        {{ old('dosen_id', $mahasiswa->dosen_id ?? '') == $lecture->id ? 'selected' : '' }}>
                    {{ $lecture->nama_dosen }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($mahasiswa) ? 'Update' : 'Simpan' }}</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection