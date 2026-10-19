@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Peminjaman Lab</h1>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus mr-1"></i> Tambah Peminjaman
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-sm" width="100%">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Peminjam</th>
                        <th>Laboratorium</th>
                        <th>Tanggal Pinjam</th>
                        <th>Keperluan</th>
                        <th>Status</th>
                        <th width="20%">Aksi / ACC</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjamans as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->nama_peminjam }}</td>
                            <td>{{ $p->lab->nama_lab ?? '-' }}</td>
                            <td>{{ $p->tanggal_pinjam }}</td>
                            <td>{{ $p->keperluan }}</td>
                            <td>
                                @if($p->status == 'Disetujui')
                                    <span class="badge badge-success">Disetujui</span>
                                @elseif($p->status == 'Ditolak')
                                    <span class="badge badge-danger">Ditolak</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                <!-- Tombol ACC/Reject untuk Admin -->
                                <form action="{{ route('peminjaman.updateStatus', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Disetujui">
                                    <button class="btn btn-sm btn-success" title="Setujui"><i class="fas fa-check"></i></button>
                                </form>

                                <form action="{{ route('peminjaman.updateStatus', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Ditolak">
                                    <button class="btn btn-sm btn-secondary" title="Tolak"><i class="fas fa-times"></i></button>
                                </form>

                                <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data peminjaman?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">Belum ada data peminjaman lab.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
