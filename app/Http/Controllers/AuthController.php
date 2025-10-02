<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Halaman login
    public function index()
    {
        return view('auth.login-form');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi manual
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|regex:/[A-Z]/'
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung huruf kapital.'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Jika username == password → login berhasil
        if ($username === $password) {
            return view('dashboard', compact('username'));
        } else {
            return back()->withErrors(['msg' => 'Username dan password harus sama untuk login.'])->withInput();
        }
    }
}
