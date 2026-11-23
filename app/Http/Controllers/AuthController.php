<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Form Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'Admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Selamat Datang Admin!');
            }

            return redirect()->route('guest.peminjaman')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau Password salah!')->onlyInput('email');
    }

    // Form Register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses Register (Otomatis Role: User / Mahasiswa)
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User',
        ]);

        Auth::login($user);

        return redirect()->route('guest.peminjaman')->with('success', 'Registrasi berhasil!');
    }

    // Form Lupa Password
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // Proses Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ], [
            'email.exists' => 'Email tidak ditemukan dalam sistem.',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login.');
    }

    // Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
