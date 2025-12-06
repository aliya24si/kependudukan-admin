<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Program;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftarController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftar::with(['warga', 'program', 'media']);

        if ($request->search) {
            $query->whereHas('warga', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            })->orWhereHas('program', function ($q) use ($request) {
                $q->where('nama_program', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->program_id) {
            $query->where('program_id', $request->program_id);
        }

        $pendaftar = $query->paginate(10);
        $program = Program::orderBy('nama_program')->get();

        return view('pages.pendaftar.index', compact('pendaftar', 'program'));
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
            'warga_id'   => 'required',
            'program_id' => 'required',
            'status'     => 'required',
            'berkas'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'media.*'    => 'nullable|file|mimes:jpg,jpeg,png|max:4096',
        ]);

        // Simpan berkas utama
        $fileName = null;
        if ($request->hasFile('berkas')) {
            $fileName = time() . '_' . $request->file('berkas')->getClientOriginalName();
            $request->file('berkas')->move(public_path('uploads/berkas'), $fileName);
        }

        $pendaftar = Pendaftar::create([
            'warga_id'   => $request->warga_id,
            'program_id' => $request->program_id,
            'status'     => $request->status,
            'berkas'     => $fileName,
        ]);

        // Simpan media tambahan
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $path = $file->store('media/pendaftar', 'public');

                Media::create([
                    'ref_table' => 'pendaftar',
                    'ref_id'    => $pendaftar->pendaftar_id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::with(['warga', 'program', 'media'])->findOrFail($id);

        return view('pages.pendaftar.show', compact('pendaftar'));
    }

    public function edit($id)
    {
        $pendaftar = Pendaftar::with('media')->findOrFail($id);
        $warga = Warga::all();
        $program = Program::all();

        return view('pages.pendaftar.edit', compact('pendaftar', 'warga', 'program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'warga_id'   => 'required',
            'program_id' => 'required',
            'status'     => 'required',
            'berkas'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'media.*'    => 'nullable|file|mimes:jpg,jpeg,png|max:4096'
        ]);

        $pendaftar = Pendaftar::findOrFail($id);

        // Update file utama
        $fileName = $pendaftar->berkas;
        if ($request->hasFile('berkas')) {

            if ($fileName && file_exists(public_path('uploads/berkas/' . $fileName))) {
                unlink(public_path('uploads/berkas/' . $fileName));
            }

            $fileName = time() . '_' . $request->file('berkas')->getClientOriginalName();
            $request->file('berkas')->move(public_path('uploads/berkas'), $fileName);
        }

        $pendaftar->update([
            'warga_id'   => $request->warga_id,
            'program_id' => $request->program_id,
            'status'     => $request->status,
            'berkas'     => $fileName,
        ]);

        // Upload media tambahan
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $path = $file->store('media/pendaftar', 'public');

                Media::create([
                    'ref_table' => 'pendaftar',
                    'ref_id'    => $pendaftar->pendaftar_id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftar::with('media')->findOrFail($id);

        // hapus media tambahan
        foreach ($pendaftar->media as $m) {
            Storage::disk('public')->delete($m->file_path);
            $m->delete();
        }

        // hapus file berkas utama
        if ($pendaftar->berkas && file_exists(public_path('uploads/berkas/' . $pendaftar->berkas))) {
            unlink(public_path('uploads/berkas/' . $pendaftar->berkas));
        }

        $pendaftar->delete();

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil dihapus');
    }

    // Hapus satu media
    public function deleteMedia(Media $media)
    {
        Storage::disk('public')->delete($media->file_path);
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus');
    }
}
