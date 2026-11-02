<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Reservasi Lab</title>
    <!-- Template SB Admin 2 & FontAwesome -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        .bg-gradient-custom {
            background: linear-gradient(135deg, #4e73df 10%, #224abe 100%);
        }
        .hero-section {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Partial View Navbar -->
    @include('guest.navbar')

    <!-- Content -->
    <div class="container my-5 flex-grow-1">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-white py-3 text-center border-top mt-auto">
        <small class="text-muted">Copyright &copy; Reservasi Lab {{ date('Y') }}</small>
    </footer>

</body>
</html>
