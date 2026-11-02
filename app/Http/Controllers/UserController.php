<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\User;
use Illuminate\Http\Request;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Impor DB Facade untuk Query Builder
>>>>>>> master
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

=======
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

>>>>>>> master
    public function create()
    {
        return view('admin.users.create');
    }

<<<<<<< HEAD
=======
    // TAMBAH DATA (Query Builder)
>>>>>>> master
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:Admin,User',
        ]);

<<<<<<< HEAD
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
=======
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
>>>>>>> master
            'role'  => 'required|in:Admin,User',
        ]);

        $data = [
<<<<<<< HEAD
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
=======
            'name'       => $request->name,
            'email'      => $request->email,
            'role'       => $request->role,
            'updated_at' => now(),
>>>>>>> master
        ];

        if ($request->filled('password')) {
            $request->validate(['password' => 'min:6']);
            $data['password'] = Hash::make($request->password);
        }

<<<<<<< HEAD
        $user->update($data);
=======
        DB::table('users')->where('id', $id)->update($data);
>>>>>>> master

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate!');
    }

<<<<<<< HEAD
    public function destroy(User $user)
    {
        $user->delete();
=======
    // HAPUS DATA (Query Builder)
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

>>>>>>> master
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
