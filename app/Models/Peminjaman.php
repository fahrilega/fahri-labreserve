<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional jika nama tabel 'peminjamans')
    protected $table = 'peminjamans';

    protected $fillable = [
        'lab_id',
        'user_id',
        'nama_peminjam',
        'tanggal_pinjam',
        'keperluan',
        'status',
    ];

    // Relasi ke Model Lab
    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }

    // Relasi ke Model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
