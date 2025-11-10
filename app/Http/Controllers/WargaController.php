<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // Menampilkan halaman index dengan data warga
    public function index()
    {
        // Ambil semua data warga dari DB, bisa pakai pagination juga
        $warga = Warga::all();

        // Kirim data ke view
        return view('pages.warga.index', compact('warga'));
    }

    // Menampilkan form tambah data (opsional, karena form sudah di include di index)
    public function create()
    {
        return view('pages.warga.create');
    }

    // Menyimpan data warga baru ke database
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp', // unique di tabel warga kolom no_ktp
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'telp' => 'required|string|max:20',
            'email' => 'required|email|unique:warga,email',
        ], [
            'no_ktp.required' => 'No KTP wajib diisi.',
            'no_ktp.unique' => 'No KTP sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid.',
            'agama.required' => 'Agama wajib diisi.',
            'pekerjaan.required' => 'Pekerjaan wajib diisi.',
            'telp.required' => 'No Telp wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
        ]);

        // Simpan data ke database
        Warga::create([
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'telp' => $request->telp,
            'email' => $request->email,
        ]);

        // Redirect ke halaman warga dengan pesan sukses
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil disimpan.');
    }

    // Menampilkan form edit data warga
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    // Update data warga
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        // Validasi data update (perhatikan pengecualian unique untuk data yang sama)
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:100',
            'pekerjaan' => 'required|string|max:100',
            'telp' => 'required|string|max:20',
            'email' => 'required|email|unique:warga,email,' . $warga->warga_id . ',warga_id',
        ], [
            'no_ktp.required' => 'No KTP wajib diisi.',
            'no_ktp.unique' => 'No KTP sudah digunakan.',
            'nama.required' => 'Nama wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid.',
            'agama.required' => 'Agama wajib diisi.',
            'pekerjaan.required' => 'Pekerjaan wajib diisi.',
            'telp.required' => 'No Telp wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
        ]);

        // Update data
        $warga->update([
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'telp' => $request->telp,
            'email' => $request->email,
        ]);

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    // Hapus data warga
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}
