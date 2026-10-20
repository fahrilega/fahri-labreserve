<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Master Lab
       Schema::create('labs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lab');
            $table->string('lokasi');
            $table->integer('kapasitas');
            $table->enum('status_lab', ['Tersedia', 'Perawatan'])->default('Tersedia');
            $table->text('fasilitas');
            $table->timestamps();
        });

        // 2. Tabel Master Peminjam
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('nim_nip')->unique();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('no_whatsapp');
            $table->timestamps();
        });

        // 3. Tabel Master Peralatan
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->string('kategori');
            $table->enum('kondisi', ['Baik', 'Rusak Sederhana', 'Rusak Berat'])->default('Baik');
            $table->integer('jumlah_stok');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipments');
        Schema::dropIfExists('borrowers');
        Schema::dropIfExists('labs');
    }
};
