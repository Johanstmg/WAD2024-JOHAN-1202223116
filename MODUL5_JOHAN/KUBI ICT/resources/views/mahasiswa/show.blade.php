@extends('layout.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<h1>Detail Data Mahasiswa</h1>
<ul class="list-group">
    <li class="list-group-item">NIM: {{ $mahasiswa->nim }}</li>
    <li class="list-group-item">Nama: {{ $mahasiswa->nama_mahasiswa }}</li>
    <li class="list-group-item">Jurusan: {{ $mahasiswa->jurusan }}</li>
    <li class="list-group-item">Email: {{ $mahasiswa->email }}</li>
    <li class="list-group-item">Dosen Wali: {{ $mahasiswa->dosen->nama_dosen }}</li>
</ul>
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
