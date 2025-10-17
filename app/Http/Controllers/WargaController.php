<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    public function index()
    {
        $row = Warga::all();
        return view('admin.feature', compact('row'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp|max:20',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|max:50',
            'pekerjaan' => 'required|max:100',
            'telp' => 'required|max:20',
            'email' => 'required|email|max:100',
        ]);

        Warga::create($validated);

        return redirect()->route('warga.index')->with('info', 'Data warga berhasil disimpan.');
    }

    public function edit($id)
    {
        $row = Warga::findOrFail($id);
        return view('warga.edit', compact('row'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $validated = $request->validate([
            'no_ktp' => 'required|max:20|unique:warga,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|max:50',
            'pekerjaan' => 'required|max:100',
            'telp' => 'required|max:20',
            'email' => 'required|email|max:100',
        ]);

        $warga->update($validated);

        return redirect()->route('admin.feature')->with('info', 'Data warga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Warga::findOrFail($id)->delete();
        return redirect()->route('admin.feature')->with('info', 'Data warga berhasil dihapus.');
    }
}
