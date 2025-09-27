<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    // Menampilkan daftar data dari session
    public function index(Request $request)
    {
        // Ambil data dari session, default array kosong
        $data = $request->session()->get('penerima_bantuan', []);
        return view('penerima.index', compact('data'));
    }

    // Menampilkan form input
    public function create()
    {
        return view('penerima.create');
    }

    // Menyimpan data ke session
    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
        ]);

        // Ambil data lama
        $data = $request->session()->get('penerima_bantuan', []);

        // Buat ID otomatis
        $nextId = count($data) + 1;

        // Masukkan data baru ke array
        $data[] = [
            'penerima_id' => $nextId,
            'program_id'  => $request->program_id,
            'warga_id'    => $request->warga_id
        ];

        // Simpan kembali ke session
        $request->session()->put('penerima_bantuan', $data);

        return redirect()->route('penerima.index')->with('success', 'Data berhasil disimpan!');
    }
}
