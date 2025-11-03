<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    /**
     * Tampilkan semua data program
     */
    public function index()
    {
        $programs = Program::orderBy('tahun', 'desc')->get();
        return view('pages.program.index', compact('programs'));
    }

    /**
     * Tampilkan form tambah program baru
     */
    public function create()
    {
        return view('pages.program.create');
    }

    /**
     * Simpan data program baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'        => 'required|max:10|unique:programs,kode',
            'nama_program'=> 'required|max:100',
            'tahun'       => 'required|integer',
            'deskripsi'   => 'nullable|string',
            'anggaran'    => 'required|numeric',
            'media'       => 'nullable|string',
        ]);

        Program::create($validated);

        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit program
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('pages.program.edit', compact('program'));
    }

    /**
     * Update data program
     */
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'kode'        => 'required|max:10|unique:programs,kode,' . $program->id,
            'nama_program'=> 'required|max:100',
            'tahun'       => 'required|integer',
            'deskripsi'   => 'nullable|string',
            'anggaran'    => 'required|numeric',
            'media'       => 'nullable|string',
        ]);

        $program->update($validated);

        return redirect()->route('program.index')->with('success', 'Program berhasil diperbarui!');
    }

    /**
     * Hapus data program
     */
    public function destroy($id)
    {
        Program::destroy($id);
        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus!');
    }
}
