<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-custom shadow">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
            <i class="fas fa-flask mr-2"></i>Reservasi Lab
        </a>
        <div class="navbar-nav ml-auto align-items-center">
            <a class="nav-item nav-link font-weight-bold px-3 text-white" href="{{ url('/') }}">
                <i class="fas fa-home mr-1"></i> Home
            </a>

            @auth
                @if(Auth::user()->role === 'Admin')
                    <a class="nav-item nav-link font-weight-bold px-3 text-white" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard Admin
                    </a>
                @else
                    <a class="nav-item nav-link font-weight-bold px-3 text-white" href="{{ route('guest.peminjaman') }}">
                        <i class="fas fa-calendar-check mr-1"></i> Peminjaman
                    </a>
                    <a class="nav-item nav-link font-weight-bold px-3 text-white" href="{{ route('guest.users') }}">
                        <i class="fas fa-users mr-1"></i> Borrower
                    </a>
                @endif
            @endauth

            <a class="nav-item nav-link font-weight-bold px-3 text-white" href="{{ url('/contact') }}">
                <i class="fas fa-envelope mr-1"></i> Contact Us
            </a>

            @guest
                <a class="btn btn-warning font-weight-bold ml-2 px-4 shadow-sm text-dark" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt mr-1"></i> Login
                </a>
                <a class="btn btn-outline-light font-weight-bold ml-2 px-3" href="{{ route('register') }}">
                    <i class="fas fa-user-plus mr-1"></i> Register
                </a>
            @else
                <span class="badge badge-light text-primary font-weight-bold ml-3 px-3 py-2 shadow-sm">
                    <i class="fas fa-user-tag mr-1"></i> {{ Auth::user()->name }} (Role: {{ Auth::user()->role }})
                </span>
                <form action="{{ route('logout') }}" method="POST" class="d-inline ml-2">
                    @csrf
                    <button type="submit" class="btn btn-danger font-weight-bold px-3 shadow-sm">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
