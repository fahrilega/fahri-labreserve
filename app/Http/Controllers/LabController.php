<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    // 1. Menampilkan Halaman Dashboard / Tabel Data Lab
    public function index()
    {
        $labs = Lab::all();
        return view('admin.dashboard', compact('labs'));
    }

    // 2. Menampilkan Form Tambah Lab
    public function create()
    {
        return view('labs.create');
    }

    // 3. Memproses Penyimpanan Data Lab Baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lab'  => 'required|min:3',
            'kapasitas' => 'required|numeric',
            'fasilitas' => 'required',
        ], [
            'nama_lab.required'  => 'Nama laboratorium wajib diisi!',
            'nama_lab.min'       => 'Nama lab minimal 3 karakter.',
            'kapasitas.required' => 'Kapasitas wajib diisi!',
            'kapasitas.numeric'  => 'Kapasitas harus berupa angka!',
            'fasilitas.required' => 'Fasilitas wajib diisi!',
        ]);

        Lab::create([
            'nama_lab'  => $request->nama_lab,
            'kapasitas' => $request->kapasitas,
            'lokasi'    => 'Gedung Utama',
            'fasilitas' => $request->fasilitas,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Data Laboratorium berhasil disimpan!');
    }
}
