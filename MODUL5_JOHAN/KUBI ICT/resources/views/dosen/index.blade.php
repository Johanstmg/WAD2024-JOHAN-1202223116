@extends('layout.app')

@section('title', 'Daftar Dosen')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Dosen</h1>
    <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dosen as $lecture)
        <tr>
            <td>{{ $lecture->kode_dosen }}</td>
            <td>{{ $lecture->nama_dosen }}</td>
            <td>{{ $lecture->nip }}</td>
            <td>{{ $lecture->email }}</td>
            <td>{{ $lecture->no_telepon }}</td>
            <td>
                <a href="{{ route('dosen.edit', $lecture->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('dosen.destroy', $lecture->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection