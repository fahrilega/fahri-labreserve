@extends('guest.layout')

@section('content')
<!-- Hero Section -->
<div class="jumbotron bg-gradient-custom text-white hero-section p-5 mb-5 text-center">
    <h1 class="display-4 font-weight-bold mb-3">Selamat Datang di Sistem Reservasi Lab</h1>
    <p class="lead mb-4">Lakukan peminjaman dan pengelolaan ruang laboratorium kampus secara praktis dan terstruktur.</p>
    <a href="{{ url('/auth') }}" class="btn btn-light btn-lg font-weight-bold text-primary shadow-sm px-4">
        <i class="fas fa-calendar-check mr-2"></i>Mulai Reservasi
    </a>
</div>

<!-- Feature Cards -->
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-3">
            <div class="card-body text-center">
                <i class="fas fa-desktop fa-3x text-primary mb-3"></i>
                <h5 class="font-weight-bold text-gray-800">Fasilitas Lengkap</h5>
                <p class="text-muted small">Akses data laboratorium dan komputer yang siap digunakan untuk kegiatan perkuliahan.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-3">
            <div class="card-body text-center">
                <i class="fas fa-clock fa-3x text-success mb-3"></i>
                <h5 class="font-weight-bold text-gray-800">Proses Cepat</h5>
                <p class="text-muted small">Ajukan peminjaman secara langsung dan pantau status persetujuan dari admin.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-3">
            <div class="card-body text-center">
                <i class="fas fa-user-shield fa-3x text-info mb-3"></i>
                <h5 class="font-weight-bold text-gray-800">Sistem Terintegrasi</h5>
                <p class="text-muted small">Pengelolaan jadwal dan pengguna terpusat dengan sistem keamanan terenkripsi.</p>
            </div>
        </div>
    </div>
</div>
@endsection
