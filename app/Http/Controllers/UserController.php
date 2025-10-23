<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // INDEX + CREATE (jadi satu halaman)
    public function index()
    {
        $users = User::all();
        return view('admin.contact', compact('users'));
    }

    // STORE user baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit(User $user)
    {
        return view('edit_user', compact('user'));
    }

    // UPDATE data user
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Jika email sama → hanya update password bila diisi
        if ($request->email === $user->email) {
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
        } else {
            // Jika email diubah, pastikan belum dipakai
            $request->validate(['email' => 'unique:users,email']);
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
        }

        $user->name = $request->name;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Data user berhasil diperbarui.');
    }

    // DELETE user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
