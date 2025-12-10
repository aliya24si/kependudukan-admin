<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPenyaluran;
use App\Models\Program;
use App\Models\PenerimaBantuan;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RiwayatPenyaluranController extends Controller
{
    public function index(Request $request)
    {
        $query = RiwayatPenyaluran::with(['program', 'penerima', 'media']);

        if ($request->program_id) {
            $query->where('program_id', $request->program_id);
        }

        $riwayat = $query->paginate(10);
        $program = Program::orderBy('nama_program')->get();

        return view('pages.riwayat.index', compact('riwayat', 'program'));
    }

    public function create()
    {
        $program = Program::all();
        $penerima = PenerimaBantuan::with('warga')->get();

        return view('pages.riwayat.create', compact('program', 'penerima'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id'  => 'required',
            'penerima_id' => 'required',
            'tahap_ke'    => 'required|integer|min:1',
            'tanggal'     => 'required|date',
            'nilai'       => 'required|numeric|min:0',
            'media.*'     => 'nullable|file|mimes:jpg,jpeg,png|max:4096',
        ]);

        $riwayat = RiwayatPenyaluran::create($request->only([
            'program_id', 'penerima_id', 'tahap_ke', 'tanggal', 'nilai'
        ]));

        if ($request->hasFile('media')) {
            foreach ($request->media as $file) {
                $path = $file->store('media/penyaluran', 'public');

                Media::create([
                    'ref_table' => 'penyaluran_bantuan',
                    'ref_id'    => $riwayat->penyaluran_id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('riwayat.index')->with('success', 'Riwayat penyaluran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $riwayat = RiwayatPenyaluran::with(['program', 'penerima', 'media'])->findOrFail($id);

        return view('pages.riwayat.show', compact('riwayat'));
    }

    public function edit($id)
    {
        $riwayat = RiwayatPenyaluran::with('media')->findOrFail($id);
        $program = Program::all();
        $penerima = PenerimaBantuan::with('warga')->get();

        return view('pages.riwayat.edit', compact('riwayat', 'program', 'penerima'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'program_id'  => 'required',
            'penerima_id' => 'required',
            'tahap_ke'    => 'required|integer|min:1',
            'tanggal'     => 'required|date',
            'nilai'       => 'required|numeric|min:0',
            'media.*'     => 'nullable|file|mimes:jpg,jpeg,png|max:4096',
        ]);

        $riwayat = RiwayatPenyaluran::findOrFail($id);

        $riwayat->update($request->only([
            'program_id', 'penerima_id', 'tahap_ke', 'tanggal', 'nilai'
        ]));

        if ($request->hasFile('media')) {
            foreach ($request->media as $file) {
                $path = $file->store('media/penyaluran', 'public');

                Media::create([
                    'ref_table' => 'penyaluran_bantuan',
                    'ref_id'    => $riwayat->penyaluran_id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil diupdate.');
    }

    public function destroy($id)
    {
        $riwayat = RiwayatPenyaluran::with('media')->findOrFail($id);

        foreach ($riwayat->media as $m) {
            Storage::disk('public')->delete($m->file_path);
            $m->delete();
        }

        $riwayat->delete();

        return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil dihapus.');
    }

    public function deleteMedia(Media $media)
    {
        Storage::disk('public')->delete($media->file_path);
        $media->delete();

        return back()->with('success', 'Media berhasil dihapus');
    }
}
