<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function show()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:100',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:6|confirmed',
            'role'             => 'required|in:admin,staff',
            'profile_picture'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('profile_picture')) {
            $photoPath = $request->file('profile_picture')
                                 ->store('profile', 'public');
        }

        $user = User::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'role'            => $request->role,
            'password'        => Hash::make($request->password),
            'profile_picture' => $photoPath,
        ]);

        // auto login setelah register
        Auth::login($user);

        return redirect()->route('dashboard')
            ->with('success', 'Registrasi berhasil, selamat datang!');
    }
}
