@extends('guest.layout')

@section('content')
<div class="container my-4">
    <h3 class="mb-3">Daftar Pengguna / Peminjam (Query Builder)</h3>
    <table class="table table-striped table-bordered bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">Belum ada data user.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
