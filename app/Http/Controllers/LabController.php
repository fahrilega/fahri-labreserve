<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Borrower;
use App\Models\User; // Tambahkan import Model User
use Illuminate\Http\Request;

class LabController extends Controller
{
    // 1. Menampilkan Halaman Dashboard Utama (Semua Ringkasan)
    public function index()
    {
        $labs = Lab::all();
        $borrowers = Borrower::with(['user', 'lab'])->latest()->get();
        $users = User::all();

        return view('admin.dashboard', compact('labs', 'borrowers', 'users'));
    }

    // 2. Menampilkan Halaman Khusus Data Peminjaman
    public function peminjaman()
    {
        $borrowers = Borrower::with(['user', 'lab'])->latest()->get();
        return view('admin.peminjaman', compact('borrowers'));
    }

    // 3. Menampilkan Halaman Khusus Data Lab
    public function labs()
    {
        $labs = Lab::all();
        return view('admin.labs', compact('labs'));
    }

    // 4. Menampilkan Halaman Khusus Data User
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // 5. Menampilkan Form Tambah Lab
    public function create()
    {
        return view('labs.create');
    }

    // 6. Memproses Penyimpanan Data Lab Baru
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
