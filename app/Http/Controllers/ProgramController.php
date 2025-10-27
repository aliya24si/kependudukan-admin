<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    // Tampilkan semua data + form input di halaman event
    public function index()
    {
        $programs = Program::orderBy('tahun', 'desc')->get();
        return view('pages.program.event', compact('programs'));

    }

    // Simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|max:10|unique:programs',
            'nama_program' => 'required|max:100',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'anggaran' => 'required|numeric',
            'media' => 'nullable|string',
        ]);

        Program::create($validated);

        return redirect()->route('event.index')->with('success', 'Program berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('program.edit', compact('program'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'kode' => 'required|max:10|unique:programs,kode,' . $program->program_id . ',program_id',
            'nama_program' => 'required|max:100',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'anggaran' => 'required|numeric',
            'media' => 'nullable|string',
        ]);

        $program->update($validated);

        return redirect()->route('event.index')->with('success', 'Data program berhasil diperbarui!');
    }

    // Hapus data
    public function destroy($id)
    {
        Program::destroy($id);
        return redirect()->route('event.index')->with('success', 'Program berhasil dihapus!');
    }
}
