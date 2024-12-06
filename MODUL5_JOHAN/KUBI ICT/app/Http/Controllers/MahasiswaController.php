<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class MahasiswaController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        // Menggunakan eager loading untuk relasi dosen
        $mahasiswa = Mahasiswa::with('dosen')->get();
        $totalDosen = Dosen::count();
        $totalMahasiswa = Mahasiswa::count();
        return view('mahasiswa.index', compact('mahasiswa', 'totalMahasiswa', 'totalDosen'));
    }    
    
    // Menampilkan Detail
    public function show($id)
    {
        // Memastikan relasi dosen ikut dimuat
        $mahasiswa = Mahasiswa::with('dosen')->findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }    
    
    // Menampilkan Form Tambah
    public function create()
    {
        // Mengambil semua dosen untuk dropdown di form
        $dosen = Dosen::all();
        return view('mahasiswa.create', compact('dosen'));
    }    
    
    // Simpan inputan dari Form Tambah
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas',
            'jurusan' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);
    
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Ditambahkan');
    }    
    
    // Tampilkan Form edit Data
    public function edit($id)
    {
        // Mengambil data mahasiswa dan semua dosen untuk dropdown
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosen = Dosen::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'dosen'));
    }    
    
    // Update Data
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
    
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama_mahasiswa' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'jurusan' => 'required',
            'dosen_id' => 'required|exists:dosens,id',
        ]);
    
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Diperbaharui');
    }    
    
    // Hapus Data
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Dihapus');
    }    
}
