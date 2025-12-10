<?php

namespace App\Http\Controllers;

use App\Models\VerifikasiLapangan;
use App\Models\Pendaftar;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VerifikasiLapanganController extends Controller
{
    public function index(Request $request)
    {
        $query = VerifikasiLapangan::with(['pendaftar.warga', 'media']);

        if ($request->search) {
            $query->whereHas('pendaftar.warga', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $data = $query->paginate(10);

        return view('pages.verifikasi.index', compact('data'));
    }

    public function create()
    {
        $pendaftar = Pendaftar::with('warga')->get();

        return view('pages.verifikasi.create', compact('pendaftar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pendaftar_id' => 'required',
            'petugas'      => 'required',
            'tanggal'      => 'required|date',
            'catatan'      => 'nullable',
            'skor'         => 'nullable|integer',
            'media.*'      => 'nullable|image|max:4096',
        ]);

        $ver = VerifikasiLapangan::create($request->only(
            'pendaftar_id', 'petugas', 'tanggal', 'catatan', 'skor'
        ));

        // Upload foto
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $path = $file->store('media/verifikasi', 'public');

                Media::create([
                    'ref_table' => 'verifikasi_lapangan',
                    'ref_id'    => $ver->verifikasi_id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('verifikasi.index')
                         ->with('success', 'Verifikasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $ver = VerifikasiLapangan::with(['pendaftar.warga', 'media'])->findOrFail($id);

        return view('pages.verifikasi.show', compact('ver'));
    }

    public function edit($id)
    {
        $ver = VerifikasiLapangan::with('media')->findOrFail($id);
        $pendaftar = Pendaftar::with('warga')->get();

        return view('pages.verifikasi.edit', compact('ver', 'pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pendaftar_id' => 'required',
            'petugas'      => 'required',
            'tanggal'      => 'required|date',
            'catatan'      => 'nullable',
            'skor'         => 'nullable|integer',
            'media.*'      => 'nullable|image|max:4096',
        ]);

        $ver = VerifikasiLapangan::findOrFail($id);
        $ver->update($request->only(
            'pendaftar_id', 'petugas', 'tanggal', 'catatan', 'skor'
        ));

        // Upload foto tambahan
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {

                $path = $file->store('media/verifikasi', 'public');

                Media::create([
                    'ref_table' => 'verifikasi_lapangan',
                    'ref_id'    => $ver->verifikasi_id,
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                    'file_size' => $file->getSize(),
                ]);
            }
        }

        return redirect()->route('verifikasi.index')
                         ->with('success', 'Verifikasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $ver = VerifikasiLapangan::with('media')->findOrFail($id);

        // hapus file media
        foreach ($ver->media as $m) {
            Storage::disk('public')->delete($m->file_path);
            $m->delete();
        }

        $ver->delete();

        return redirect()->route('verifikasi.index')
                         ->with('success', 'Verifikasi berhasil dihapus');
    }

    public function deleteMedia(Media $media)
    {
        Storage::disk('public')->delete($media->file_path);
        $media->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }
}
