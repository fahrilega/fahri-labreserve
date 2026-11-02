<<<<<<< HEAD
@extends('layouts.app')
=======
@extends('guest.layout')
>>>>>>> master

@section('title', 'Form Pengajuan Peminjaman Lab')

@section('content')
<<<<<<< HEAD
<div class="container-fluid" style="max-width: 700px;">
=======
<div class="container my-4" style="max-width: 700px;">
>>>>>>> master
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-calendar-plus mr-2"></i>Form Pengajuan Peminjaman Lab</h6>
        </div>
        <div class="card-body">
<<<<<<< HEAD
            <form action="{{ route('guest.peminjaman.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Nama Peminjam</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name ?? 'Guest' }}" readonly>
                </div>

                <div class="form-group">
=======
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf

                <!-- Nama Peminjam -->
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" value="{{ old('nama_peminjam', Auth::user()->name ?? '') }}" placeholder="Masukkan nama lengkap peminjam">
                    @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pilih Laboratorium -->
                <div class="form-group mb-3">
>>>>>>> master
                    <label class="font-weight-bold">Pilih Laboratorium</label>
                    <select name="lab_id" class="form-control @error('lab_id') is-invalid @enderror">
                        <option value="">-- Pilih Lab --</option>
                        @foreach($labs as $lab)
                            <option value="{{ $lab->id }}" {{ old('lab_id') == $lab->id ? 'selected' : '' }}>
                                {{ $lab->nama_lab }} (Kapasitas: {{ $lab->kapasitas }} Orang)
                            </option>
                        @endforeach
                    </select>
                    @error('lab_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

<<<<<<< HEAD
                <button type="submit" class="btn btn-primary btn-block shadow-sm">
=======
                <!-- Tanggal Pinjam -->
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam') }}">
                    @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Keperluan / Tujuan -->
                <div class="form-group mb-3">
                    <label class="font-weight-bold">Keperluan / Tujuan Peminjaman</label>
                    <textarea name="keperluan" class="form-control @error('keperluan') is-invalid @enderror" rows="3" placeholder="Contoh: Praktikum Pemrograman Web">{{ old('keperluan') }}</textarea>
                    @error('keperluan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-primary btn-block w-100 shadow-sm mt-3">
>>>>>>> master
                    <i class="fas fa-paper-plane mr-1"></i> Kirim Pengajuan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
