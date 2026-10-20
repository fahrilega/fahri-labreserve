@extends('layouts.app')

@section('title', 'Form Pengajuan Peminjaman Lab')

@section('content')
<div class="container-fluid" style="max-width: 700px;">
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary text-white">
            <h6 class="m-0 font-weight-bold"><i class="fas fa-calendar-plus mr-2"></i>Form Pengajuan Peminjaman Lab</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('guest.peminjaman.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Nama Peminjam</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name ?? 'Guest' }}" readonly>
                </div>

                <div class="form-group">
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

                <button type="submit" class="btn btn-primary btn-block shadow-sm">
                    <i class="fas fa-paper-plane mr-1"></i> Kirim Pengajuan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
