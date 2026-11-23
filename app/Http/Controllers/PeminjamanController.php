<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Menampilkan daftar peminjaman di Halaman Admin
    public function index()
    {
        $peminjamans = Peminjaman::with('lab')->latest()->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // Menampilkan daftar peminjaman di Halaman Guest (Kebutuhan Partial View)
    public function guestIndex()
    {
        $peminjamans = Peminjaman::with('lab')->latest()->get();
        $labs = Lab::all(); // Mengambil data lab

        return view('guest.peminjaman', compact('peminjamans', 'labs'));
    }

    public function create()
    {
        $labs = Lab::all();
        return view('admin.peminjaman.create', compact('labs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lab_id'         => 'required|exists:labs,id',
            'nama_peminjam'  => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'keperluan'      => 'required|string',
        ], [
            'lab_id.required'         => 'Laboratorium wajib dipilih!',
            'nama_peminjam.required'  => 'Nama peminjam wajib diisi!',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi!',
            'keperluan.required'      => 'Keperluan wajib diisi!',
        ]);

        Peminjaman::create([
            'lab_id'         => $request->lab_id,
            'nama_peminjam'  => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keperluan'      => $request->keperluan,
            'status'         => 'Pending',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }
}
