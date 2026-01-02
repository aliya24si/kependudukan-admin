<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PenerimaBantuan;
use App\Models\Program;
use App\Models\RiwayatPenyaluran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RiwayatPenyaluranController extends Controller
{
    public function index(Request $request)
    {
        $query = RiwayatPenyaluran::with([
            'penerima.warga',
            'penerima.program',
            'media',
        ]);

        // 🔍 FILTER PROGRAM
        if ($request->program_id) {
            $query->whereHas('penerima', function ($q) use ($request) {
                $q->where('program_id', $request->program_id);
            });
        }

        $riwayat = $query->paginate(10)->withQueryString();
        $program = Program::orderBy('nama_program')->get();

        return view('pages.riwayat.index', compact('riwayat', 'program'));
    }

    public function create()
    {
        $penerima = PenerimaBantuan::with(['warga', 'program'])->get();
        return view('pages.riwayat.create', compact('penerima'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required',
            'tahap_ke'    => 'required|integer|min:1',
            'tanggal'     => 'required|date',
            'nilai'       => 'required|numeric|min:0',
            'media.*'     => 'nullable|file|mimes:jpg,jpeg,png|max:4096',
        ]);

        $riwayat = RiwayatPenyaluran::create($request->only([
            'penerima_id', 'tahap_ke', 'tanggal', 'nilai',
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
        $riwayat = RiwayatPenyaluran::with(['penerima.warga', 'penerima.program', 'media'])
            ->findOrFail($id);

        return view('pages.riwayat.show', compact('riwayat'));
    }

    public function edit($id)
    {
        $riwayat  = RiwayatPenyaluran::with('media')->findOrFail($id);
        $penerima = PenerimaBantuan::with(['warga', 'program'])->get();

        return view('pages.riwayat.edit', compact('riwayat', 'penerima'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penerima_id' => 'required',
            'tahap_ke'    => 'required|integer|min:1',
            'tanggal'     => 'required|date',
            'nilai'       => 'required|numeric|min:0',
            'media.*'     => 'nullable|file|mimes:jpg,jpeg,png|max:4096',
        ]);

        $riwayat = RiwayatPenyaluran::findOrFail($id);

        $riwayat->update($request->only([
            'penerima_id', 'tahap_ke', 'tanggal', 'nilai',
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
        if (! str_starts_with($media->file_path, 'dummy/')) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        return back()->with('success', 'Media berhasil dihapus');
    }

}
