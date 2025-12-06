<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $users = $query->paginate(10);

        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required',
            'email'           => 'required|email|unique:users',
            'password'        => 'required|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'            => 'required',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'password'        => 'nullable|confirmed',
        ]);

        if ($request->password) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diubah');
    }

    public function destroy(User $user)
    {
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
