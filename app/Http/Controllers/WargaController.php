<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // Index & Create in one page
    public function index()
    {
        $warga = Warga::all();
        //dd('Controller dijalankan', $warga);
        return view('admin.feature', compact('warga'));

    }

    // Store data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'required',
            'telp'          => 'nullable|string|max:20',
            'email'         => 'nullable|email',
        ]);

        Warga::create($validated);
        return redirect()->back()->with('success', 'Data warga berhasil ditambahkan!');
    }

    // Edit form
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('edit_feature', compact('warga'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $validated = $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp,' . $warga->warga_id . ',warga_id',
            'nama'          => 'required|string|max:100',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'required',
            'telp'          => 'nullable|string|max:20',
            'email'         => 'nullable|email',
        ]);

        $warga->update($validated);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    // Delete data
    public function destroy($id)
    {
        Warga::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data warga berhasil dihapus!');
    }
}
