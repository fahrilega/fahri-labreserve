<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - Reservasi Lab</title>

    <!-- Custom fonts & styles for SB Admin 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @if(view()->exists('layouts.sidebar'))
            @include('layouts.sidebar')
        @endif

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Search & User Info -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? 'User' }}</span>
                                <img class="img-profile rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard Sistem Reservasi Lab</h1>
                    </div>

                    <!-- ROW UTAMA: MELEBAR FULL 100% (COL-12) -->
                    <div class="row">
                        <div class="col-12">

                            <!-- 1. TABEL DATA PEMINJAMAN LAB -->
                            <div class="card shadow mb-4" id="tabel-peminjaman">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-calendar-alt mr-2"></i>Data Peminjaman Lab
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-sm" width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Peminjam</th>
                                                    <th>Lab</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Status</th>
                                                    <th width="15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($borrowers as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->user->name ?? '-' }}</td>
                                                        <td>{{ $item->lab->nama_lab ?? '-' }}</td>
                                                        <td>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</td>
                                                        <td>
                                                            @if($item->status == 'pending')
                                                                <span class="badge badge-warning">Pending</span>
                                                            @elseif($item->status == 'approved')
                                                                <span class="badge badge-success">Disetujui</span>
                                                            @else
                                                                <span class="badge badge-danger">Ditolak</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-info py-0 px-2">Detail</button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center text-muted py-3">Belum ada data peminjaman lab.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. TABEL DATA LABORATORIUM -->
                            <div class="card shadow mb-4" id="tabel-lab">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-flask mr-2"></i>Data Laboratorium
                                    </h6>
                                    @if(Route::has('labs.create'))
                                        <a href="{{ route('labs.create') }}" class="btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Lab Baru
                                        </a>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-sm" width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Nama Lab</th>
                                                    <th>Kapasitas</th>
                                                    <th>Lokasi</th>
                                                    <th>Fasilitas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($labs as $lab)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $lab->nama_lab }}</td>
                                                        <td>{{ $lab->kapasitas }} Orang</td>
                                                        <td>{{ $lab->lokasi ?? 'Gedung Utama' }}</td>
                                                        <td>{{ $lab->fasilitas }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted py-3">Belum ada data laboratorium.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. TABEL DATA USER -->
                            <div class="card shadow mb-4" id="tabel-user">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        <i class="fas fa-users mr-2"></i>Data Pengguna / User
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-sm" width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th>Nama User</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $users = \App\Models\User::all();
                                                @endphp
                                                @forelse($users as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            <span class="badge badge-info">{{ ucfirst($user->role ?? 'User') }}</span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center text-muted py-3">Belum ada data user.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- /col-12 -->
                    </div> <!-- /row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Reservasi Lab 2026</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap & Core Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.4/js/sb-admin-2.min.js"></script>
</body>

</html>
