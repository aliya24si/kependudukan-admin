<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Warga;
use App\Models\Program;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftar::with(['warga', 'program'])->get();
        return view('pages.pendaftar.index', compact('pendaftar'));
    }

    public function create()
    {
        $warga = Warga::all();
        $program = Program::all();
        return view('pages.pendaftar.create', compact('warga', 'program'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id' => 'required',
            'program_id' => 'required',
            'status' => 'required',
            'berkas' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $fileName = null;

        if ($request->hasFile('berkas')) {
            $fileName = time() . '_' . $request->berkas->getClientOriginalName();
            $request->berkas->move(public_path('uploads/berkas'), $fileName);
        }

        Pendaftar::create([
            'warga_id' => $request->warga_id,
            'program_id' => $request->program_id,
            'status' => $request->status,
            'berkas' => $fileName
        ]);

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $warga = Warga::all();
        $program = Program::all();

        return view('pages.pendaftar.edit', compact('pendaftar', 'warga', 'program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'warga_id' => 'required',
            'program_id' => 'required',
            'status' => 'required',
            'berkas' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $pendaftar = Pendaftar::findOrFail($id);

        $fileName = $pendaftar->berkas;

        if ($request->hasFile('berkas')) {

            if ($fileName && file_exists(public_path('uploads/berkas/' . $fileName))) {
                unlink(public_path('uploads/berkas/' . $fileName));
            }

            $fileName = time() . '_' . $request->berkas->getClientOriginalName();
            $request->berkas->move(public_path('uploads/berkas'), $fileName);
        }

        $pendaftar->update([
            'warga_id' => $request->warga_id,
            'program_id' => $request->program_id,
            'status' => $request->status,
            'berkas' => $fileName
        ]);

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        if ($pendaftar->berkas && file_exists(public_path('uploads/berkas/' . $pendaftar->berkas))) {
            unlink(public_path('uploads/berkas/' . $pendaftar->berkas));
        }

        $pendaftar->delete();

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil dihapus');
    }
}
