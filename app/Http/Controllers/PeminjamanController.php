<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Peminjaman;
use App\Models\Lab;
=======
use App\Models\Lab;
use App\Models\Peminjaman;
>>>>>>> master
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
<<<<<<< HEAD
    // Menampilkan daftar semua peminjaman (untuk Admin)
    public function index()
    {
        $peminjamans = Peminjaman::with('lab', 'user')->latest()->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    // Form Tambah Peminjaman Manual oleh Admin
=======
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

>>>>>>> master
    public function create()
    {
        $labs = Lab::all();
        return view('admin.peminjaman.create', compact('labs'));
    }

<<<<<<< HEAD
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
=======
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
>>>>>>> master
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi!',
            'keperluan.required'      => 'Keperluan wajib diisi!',
        ]);

        Peminjaman::create([
<<<<<<< HEAD
            'lab_id'          => $request->lab_id,
            'nama_peminjam'   => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keperluan'      => $request->keperluan,
            'status'         => 'Pending', // Status awal
=======
            'lab_id'         => $request->lab_id,
            'nama_peminjam'  => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keperluan'      => $request->keperluan,
            'status'         => 'Pending',
>>>>>>> master
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

<<<<<<< HEAD
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
=======
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

>>>>>>> master
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }
}
