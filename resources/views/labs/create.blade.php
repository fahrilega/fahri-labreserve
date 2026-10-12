<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Laboratorium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h3 class="mb-4 text-primary">Tambah Data Lab</h3>

            <!-- Alert Flash Data Success -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('labs.store') }}" method="POST">
                @csrf

                <!-- Input Nama Lab -->
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Nama Laboratorium</label>
                    <input type="text" name="nama_lab" class="form-control @error('nama_lab') is-invalid @enderror" value="{{ old('nama_lab') }}" placeholder="Contoh: Lab Jaringan">
                    @error('nama_lab')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Kapasitas -->
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Kapasitas (Unit / Orang)</label>
                    <input type="text" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror" value="{{ old('kapasitas') }}" placeholder="Contoh: 30">
                    @error('kapasitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Fasilitas -->
                <div class="mb-3">
                    <label class="form-label font-weight-bold">Fasilitas</label>
                    <textarea name="fasilitas" class="form-control @error('fasilitas') is-invalid @enderror" rows="3" placeholder="Contoh: PC Spec Tinggi, AC, Proyektor">{{ old('fasilitas') }}</textarea>
                    @error('fasilitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
            </form>
        </div>
    </div>
</body>
</html>
