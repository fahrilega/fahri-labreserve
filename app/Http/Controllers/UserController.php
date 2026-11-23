<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Impor DB Facade untuk Query Builder
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // BACA / TAMPILKAN (Query Builder)
    public function index()
    {
        $users = DB::table('users')->orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    // BACA / TAMPILKAN untuk Halaman Guest (Kebutuhan Partial View)
   public function guestIndex()
{
    $users = DB::table('users')->get();
    return view('guest.users', compact('users')); // Diarahkan ke resources/views/guest/users.blade.php
}

    public function create()
    {
        return view('admin.users.create');
    }

    // TAMBAH DATA (Query Builder)
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:Admin,User',
        ]);

        DB::table('users')->insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan via Query Builder!');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.users.edit', compact('user'));
    }

    // UPDATE DATA (Query Builder)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role'  => 'required|in:Admin,User',
        ]);

        $data = [
            'name'       => $request->name,
            'email'      => $request->email,
            'role'       => $request->role,
            'updated_at' => now(),
        ];

        if ($request->filled('password')) {
            $request->validate(['password' => 'min:6']);
            $data['password'] = Hash::make($request->password);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate!');
    }

    // HAPUS DATA (Query Builder)
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
