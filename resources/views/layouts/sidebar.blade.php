<!-- Sidebar SB Admin 2 -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ Auth::check() && Auth::user()->role === 'Admin' ? route('admin.dashboard') : route('guest.peminjaman') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-flask"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LAB RESERVE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Info User & Role yang Sedang Login -->
    @auth
    <div class="px-3 py-3 text-center text-white">
        <div class="small font-weight-bold text-truncate">{{ Auth::user()->name }}</div>
        <span class="badge badge-light text-primary mt-1 px-2 py-1">
            <i class="fas fa-user-tag mr-1"></i> Role: {{ Auth::user()->role }}
        </span>
    </div>
    <hr class="sidebar-divider my-0">
    @endauth

    @auth
        @if(Auth::user()->role === 'Admin')
            <!-- MENU KHUSUS ADMIN -->
            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <!-- Nav Item - Data Peminjaman -->
            <li class="nav-item {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('peminjaman.index') }}">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Data Peminjaman</span>
                </a>
            </li>

            <!-- Nav Item - Data Lab -->
            <li class="nav-item {{ request()->routeIs('labs.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('labs.index') }}">
                    <i class="fas fa-fw fa-flask"></i>
                    <span>Data Lab</span>
                </a>
            </li>

            <!-- Nav Item - Data User -->
            <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data User</span>
                </a>
            </li>
        @else
            <!-- MENU KHUSUS USER / MAHASISWA -->
            <div class="sidebar-heading mt-3">
                Menu Peminjam
            </div>

            <li class="nav-item {{ request()->routeIs('guest.peminjaman') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('guest.peminjaman') }}">
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Reservasi Lab</span>
                </a>
            </li>
        @endif

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="px-3 py-2">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm btn-block">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1"></i> Logout
                </button>
            </form>
        </li>
    @endauth

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
