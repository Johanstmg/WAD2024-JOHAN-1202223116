@extends('layout.app')

@section('title', 'Hapus Dosen')

@section('content')
<h1>Hapus Data Dosen</h1>
<p>Hapus Data Dosen <strong>{{ $dosen->nama_dosen }}</strong>?</p>
<form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
