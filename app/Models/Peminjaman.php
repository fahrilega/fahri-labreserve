<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'lab_id',
        'user_id',
        'nama_peminjam',
        'tanggal_pinjam',
        'keperluan',
        'status',
    ];

    // Relasi Eloquent
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
