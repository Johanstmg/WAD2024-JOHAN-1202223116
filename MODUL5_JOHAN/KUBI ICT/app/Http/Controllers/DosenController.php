<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
class DosenController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $dosen = Dosen::all();
        $totalDosen = Dosen::count();
        $totalMahasiswa = Mahasiswa::count();
        return view('dosen.index', compact('dosen', 'totalDosen', 'totalMahasiswa'));
    }
    // Menampilkan Detail
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.show', compact('dosen'));
    }
    // Menampilkan Form Tambah
    public function create()
    {
        return view('dosen.create');
    }
    // Simpan inputan dari Form Tambah
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode_dosen' => 'required|string|max:3|unique:dosens',
            'nama_dosen' => 'required|string',
            'nip' => 'required|string|unique:dosens',
            'email' => 'required|string|unique:dosens',
            'no_telepon' => 'required|string',
        ]);

        Dosen::create($validateData);
        return redirect()->route('dosen.index')->with('success', 'Data Dosen Berhasil Ditambahkan');
    }
    // Tampilkan Form edit Data
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }
    // Update Data
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'no_telepon' => 'required',
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data Dosen Diperbarui.');
    }
    // Hapus Data
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data Dosen Dihapus');
    }    
}
