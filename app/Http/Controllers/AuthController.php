<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan Form Login
    public function showLoginForm()
    {
        return view('guest.login');
    }

    // Menangani Proses Login
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Logika Sederhana: Jika Username == Password -> Ke Dashboard
        if ($username === $password && !empty($username)) {
            return redirect()->route('labs.index')->with('success', 'Selamat Datang Admin!');
        }

        // Jika Salah -> Kembali ke halaman Login dengan Alert
        return redirect('/auth')->with('error', 'Username dan Password salah/tidak cocok!');
    }
}
