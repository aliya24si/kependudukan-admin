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

        if ($request->role) {
            $query->where('role', $request->role);
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
            'role'            => 'required|in:admin,staff',
            'password'        => 'required|confirmed',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        // ===== FOTO DEFAULT JIKA USER TIDAK UPLOAD =====
        $placeholder = 'assets-admin/images/layout_img/placeholder.jpeg';

        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')
                ->store('profile', 'public');
        } else {
            $validated['profile_picture'] = $placeholder;
        }

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
        return view('pages.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'            => 'required',
            'email'           => 'required|email|unique:users,email,' . $user->id,
            'role'            => 'required|in:admin,staff',
            'password'        => 'nullable|confirmed',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->password) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        // ===== FOTO DEFAULT =====
        $placeholder = 'assets-admin\images\layout_img\placeholder.jpeg';

        if ($request->hasFile('profile_picture')) {
            // delete foto lama kalo foto lama bukan placeholder
            if ($user->profile_picture && $user->profile_picture !== $placeholder) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $validated['profile_picture'] = $request->file('profile_picture')
                ->store('profile', 'public');

        } elseif (! $user->profile_picture) {
            // jika sebelumnya tidak ada foto (null)
            $validated['profile_picture'] = $placeholder;
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User berhasil diubah');
    }

    public function destroy(User $user)
    {
        $placeholder = 'assets-admin\images\layout_img\placeholder.jpeg';

        // jika bukan placeholder maka hapus
        if ($user->profile_picture && $user->profile_picture !== $placeholder) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
