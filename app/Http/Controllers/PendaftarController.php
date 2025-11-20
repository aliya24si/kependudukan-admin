<?php
namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Program;
use App\Models\Warga;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftar::with(['warga', 'program']);

        // --- SEARCH: cari nama warga / program ---
        if ($request->search) {
            $query->whereHas('warga', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            })->orWhereHas('program', function ($q) use ($request) {
                $q->where('nama_program', 'like', '%' . $request->search . '%');
            });
        }

        // --- FILTER STATUS ---
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // --- FILTER PROGRAM ---
        if ($request->program_id) {
            $query->where('program_id', $request->program_id);
        }

        // --- PAGINATION ---
        $pendaftar = $query->paginate(10);

        // Data untuk dropdown filter
        $program = Program::orderBy('nama_program', 'asc')->get();

        return view('pages.pendaftar.index', compact('pendaftar', 'program'));
    }

    public function create()
    {
        $warga   = Warga::all();
        $program = Program::all();
        return view('pages.pendaftar.create', compact('warga', 'program'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'warga_id'   => 'required',
            'program_id' => 'required',
            'status'     => 'required',
            'berkas'     => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $fileName = null;

        if ($request->hasFile('berkas')) {
            $fileName = time() . '_' . $request->berkas->getClientOriginalName();
            $request->berkas->move(public_path('uploads/berkas'), $fileName);
        }

        Pendaftar::create([
            'warga_id'   => $request->warga_id,
            'program_id' => $request->program_id,
            'status'     => $request->status,
            'berkas'     => $fileName,
        ]);

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $warga     = Warga::all();
        $program   = Program::all();

        return view('pages.pendaftar.edit', compact('pendaftar', 'warga', 'program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'warga_id'   => 'required',
            'program_id' => 'required',
            'status'     => 'required',
            'berkas'     => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
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
            'warga_id'   => $request->warga_id,
            'program_id' => $request->program_id,
            'status'     => $request->status,
            'berkas'     => $fileName,
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
