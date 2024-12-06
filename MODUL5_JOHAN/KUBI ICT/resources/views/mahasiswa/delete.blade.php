@extends('layout.app')

@section('title', 'Hapus Mahasiswa')

@section('content')
<h1>Hapus Mahasiswa</h1>
<p>Hapus Data Mahasiswa <strong>{{ $mahasiswa->nama_mahasiswa }}</strong>?</p>
<form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
