<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Lab;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // Menampilkan daftar semua peminjaman (untuk Admin)
    public function index()
    {
        $peminjamans = Peminjaman::with('lab', 'user')->latest()->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // Form Tambah Peminjaman Manual oleh Admin
    public function create()
    {
        $labs = Lab::all();
        return view('admin.peminjaman.create', compact('labs'));
    }

    // Simpan Data Peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'lab_id'          => 'required|exists:labs,id',
            'nama_peminjam'   => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'keperluan'      => 'required|string',
        ], [
            'lab_id.required'          => 'Laboratorium wajib dipilih!',
            'nama_peminjam.required'   => 'Nama peminjam wajib diisi!',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi!',
            'keperluan.required'      => 'Keperluan wajib diisi!',
        ]);

        Peminjaman::create([
            'lab_id'          => $request->lab_id,
            'nama_peminjam'   => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keperluan'      => $request->keperluan,
            'status'         => 'Pending', // Status awal
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    // Update Status Peminjaman (Approve/Reject)
    public function updateStatus(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => $request->status // disetujui / ditolak
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman berhasil diperbarui!');
    }

    // Hapus Data Peminjaman
    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }
}
