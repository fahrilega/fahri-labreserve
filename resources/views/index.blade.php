<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Reservasi Laboratorium</title>

    <!-- Fonts & CSS SB Admin 2 -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top" class="bg-light">

    <!-- NAVBAR ATAS (GUEST) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-primary" href="#">
                <i class="fas fa-flask mr-2"></i>Lab Reserve
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item active"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Jadwal Lab</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Fasilitas</a></li>
                    <li class="nav-item ml-2">
                        <a class="btn btn-primary btn-sm rounded-pill px-3" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA GUEST -->
    <div class="container py-4">
        <!-- Hero Section / Banner -->
        <div class="jumbotron bg-white shadow-sm text-center">
            <h1 class="display-4 font-weight-bold text-primary">Selamat Datang di Lab Reserve</h1>
            <p class="lead text-gray-800">Sistem Informasi Peminjaman dan Reservasi Ruang Laboratorium.</p>
            <hr class="my-4">
            <p>Silakan lihat ketersediaan jadwal laboratorium atau masuk ke akun kamu untuk mengajukan peminjaman.</p>
            <a class="btn btn-primary btn-lg rounded-pill px-4" href="/login" role="button">
                <i class="fas fa-calendar-plus mr-2"></i>Pinjam Sekarang
            </a>
        </div>

        <!-- Kartu Ringkasan Daftar Lab -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laboratorium</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Lab Komputer 1</div>
                        <p class="text-muted mt-2 small">Kapasitas: 40 Unit PC | Proyektor | AC</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laboratorium</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Lab Jaringan</div>
                        <p class="text-muted mt-2 small">Kapasitas: 30 Unit PC | Router | Switch</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laboratorium</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Lab Multimedia</div>
                        <p class="text-muted mt-2 small">Kapasitas: 25 Unit PC Spec Tinggi | Sound System</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS SB Admin 2 -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
