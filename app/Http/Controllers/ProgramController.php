<?php
namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Tampilkan semua data program
     */
    public function index(Request $request)
    {
        $query = Program::query();

        // --- SEARCH (kode, nama program, tahun) ---
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('kode', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_program', 'like', '%' . $request->search . '%')
                    ->orWhere('tahun', 'like', '%' . $request->search . '%');
            });
        }

        // --- FILTER BERDASARKAN TAHUN ---
        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        // Pagination (10 per halaman)
        $programs = $query->orderBy('tahun', 'desc')->paginate(10);

        // Untuk dropdown filter tahun
        $tahun_list = Program::select('tahun')->distinct()->orderBy('tahun', 'desc')->get();

        return view('pages.program.index', compact('programs', 'tahun_list'));
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
            'kode'         => 'required|max:10|unique:programs,kode',
            'nama_program' => 'required|max:100',
            'tahun'        => 'required|integer',
            'deskripsi'    => 'nullable|string',
            'anggaran'     => 'required|numeric',
            'media'        => 'nullable|string',
        ]);

        Program::create($validated);

        return redirect()->route('programs.index')->with('success', 'Program berhasil ditambahkan!');
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
            'kode'         => 'required|max:10|unique:programs,kode,' . $program->program_id . ',program_id',
            'nama_program' => 'required|max:100',
            'tahun'        => 'required|integer',
            'deskripsi'    => 'nullable|string',
            'anggaran'     => 'required|numeric',
            'media'        => 'nullable|string',
        ]);

        $program->update($validated);

        return redirect()->route('programs.index')->with('success', 'Program berhasil diperbarui!');
    }

    /**
     * Hapus data program
     */
    public function destroy($id)
    {
        Program::destroy($id);
        return redirect()->route('programs.index')->with('success', 'Program berhasil dihapus!');
    }
}
