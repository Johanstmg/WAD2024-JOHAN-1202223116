@extends('layout.app')

@section('title', 'Detail Dosen')

@section('content')
<h1>Data Dosen</h1>
<ul class="list-group">
    <li class="list-group-item">Kode: {{ $dosen->kode_dosen }}</li>
    <li class="list-group-item">Nama: {{ $dosen->nama_dosen }}</li>
    <li class="list-group-item">NIP: {{ $dosen->nip }}</li>
    <li class="list-group-item">Email: {{ $dosen->email }}</li>
    <li class="list-group-item">No Telepon: {{ $dosen->no_telepon }}</li>
</ul>
<a href="{{ route('dosen.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
