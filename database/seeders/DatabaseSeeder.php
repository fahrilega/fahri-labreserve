<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@labreserve.com'],
            [
                'name' => 'Admin Lab',
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
            ]
        );
    }
}
