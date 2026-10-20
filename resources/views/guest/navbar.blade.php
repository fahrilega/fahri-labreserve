<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-custom shadow">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
            <i class="fas fa-flask mr-2"></i>Reservasi Lab
        </a>
        <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link font-weight-bold px-3 text-white" href="{{ url('/') }}">
                <i class="fas fa-home mr-1"></i> Home
            </a>
            <a class="nav-item nav-link font-weight-bold px-3 text-white" href="{{ url('/contact') }}">
                <i class="fas fa-envelope mr-1"></i> Contact Us
            </a>
            <a class="btn btn-warning font-weight-bold ml-2 px-4 shadow-sm text-dark" href="{{ url('/auth') }}">
                <i class="fas fa-sign-in-alt mr-1"></i> Login
            </a>
        </div>
    </div>
</nav>
