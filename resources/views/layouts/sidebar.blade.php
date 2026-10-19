<!-- Sidebar SB Admin 2 -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-flask"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LAB RESERVE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
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
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.peminjaman') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Data Peminjaman</span>
        </a>
    </li>

    <!-- Nav Item - Data Lab -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('labs.index') }}">
            <i class="fas fa-fw fa-flask"></i>
            <span>Data Lab</span>
        </a>
    </li>

    <!-- Nav Item - Data User -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
