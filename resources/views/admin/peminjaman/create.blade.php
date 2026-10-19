@extends('layouts.app')

@section('content')
<div class="card shadow col-md-8 mx-auto p-0">
    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Tambah Peminjaman Lab</h6></div>
    <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" value="{{ old('nama_peminjam') }}">
                @error('nama_peminjam') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Pilih Laboratorium</label>
                <select name="lab_id" class="form-control @error('lab_id') is-invalid @enderror">
                    <option value="">-- Pilih Lab --</option>
                    @foreach($labs as $lab)
                        <option value="{{ $lab->id }}" {{ old('lab_id') == $lab->id ? 'selected' : '' }}>
                            {{ $lab->nama_lab }}
                        </option>
                    @endforeach
                </select>
                @error('lab_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam') }}">
                @error('tanggal_pinjam') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Keperluan</label>
                <textarea name="keperluan" class="form-control @error('keperluan') is-invalid @enderror" rows="3">{{ old('keperluan') }}</textarea>
                @error('keperluan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
