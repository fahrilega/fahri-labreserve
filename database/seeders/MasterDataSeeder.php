<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Data Labs
        DB::table('labs')->insert([
            [
                'nama_lab' => 'Lab Rekayasa Perangkat Lunak',
                'lokasi' => 'Gedung B Lantai 2',
                'kapasitas' => 40,
                'status_lab' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lab' => 'Lab Jaringan Komputer',
                'lokasi' => 'Gedung B Lantai 3',
                'kapasitas' => 35,
                'status_lab' => 'Tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Sample Data Borrowers
        DB::table('borrowers')->insert([
            [
                'nim_nip' => '220101001',
                'nama_lengkap' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'no_whatsapp' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Sample Data Equipments
        DB::table('equipments')->insert([
            [
                'nama_alat' => 'Proyektor EPSON',
                'kategori' => 'Bantuan Visual',
                'kondisi' => 'Baik',
                'jumlah_stok' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
