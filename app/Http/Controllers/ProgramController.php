<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Tampilkan semua data program
     */
    public function index(Request $request)
    {
        $query = Program::query();

        // Search (kode, nama program, tahun)
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('kode', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_program', 'like', '%' . $request->search . '%')
                    ->orWhere('tahun', 'like', '%' . $request->search . '%');
            });
        }

        // Filter tahun
        if ($request->tahun) {
            $query->where('tahun', $request->tahun);
        }

        $programs = $query->orderBy('tahun', 'desc')->paginate(10);

        $tahun_list = Program::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->get();

        return view('pages.program.index', compact('programs', 'tahun_list'));
    }

    /**
     * Form tambah program
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
            'media.*'      => 'nullable|file|max:20480',
        ]);

        // HAPUS media dari validated (supaya tidak ikut ke create)
        unset($validated['media']);

        // Simpan program
        $program = Program::create($validated);

        // Upload media (jika ada)
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('media/program', 'public');

                Media::create([
                    'ref_table' => 'programs',
                    'ref_id'    => $program->program_id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()
            ->route('programs.index')
            ->with('success', 'Program berhasil ditambahkan!');
    }

    /**
     * Form edit program
     */
    public function edit($id)
    {
        // ambil program beserta medianya
        $program = Program::with('media')->findOrFail($id);
        return view('pages.program.edit', compact('program'));
    }

    /**
     * Update data program + media
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'kode'         => 'required|max:10|unique:programs,kode,' . $program->program_id . ',program_id',
            'nama_program' => 'required|max:100',
            'tahun'        => 'required|integer',
            'deskripsi'    => 'nullable|string',
            'anggaran'     => 'required|numeric',
            'media.*'      => 'nullable|file|max:20480',
        ]);

        unset($validated['media']);

        $program->update($validated);

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $filePath = $file->store('media/program', 'public');

                Media::create([
                    'ref_table' => 'programs',
                    'ref_id'    => $program->program_id,
                    'file_path' => $filePath,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    /**
     * Hapus program + semua media terkait
     */
    public function destroy(Program $program)
    {
        $media = Media::where('ref_table', 'programs')
            ->where('ref_id', $program->program_id)
            ->get();

        foreach ($media as $file) {
            if ($file->file_path) {
                Storage::disk('public')->delete($file->file_path);
            }
            $file->delete();
        }

        $program->delete();

        return back()->with('success', 'Program & semua media berhasil dihapus.');
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);

        $files = Media::where('ref_table', 'programs')
            ->where('ref_id', $program->program_id)
            ->get();

        return view('pages.program.show', compact('program', 'files'));
    }

    /**
     * Hapus satu media (route harus mengirimkan media id)
     */
    public function deleteMedia(Media $media)
    {
        // hapus file fisik jika ada
        if (! str_starts_with($media->file_path, 'dummy/')) {
            Storage::disk('public')->delete($media->file_path);
        }

        // hapus record database
        $media->delete();

        return back()->with('success', 'File berhasil dihapus');
    }
}
