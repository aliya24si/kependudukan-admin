<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBantuan;
use App\Models\Program;
use App\Models\Warga;
use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    public function index(Request $request)
    {
        $query = PenerimaBantuan::with(['program', 'warga']);

        // 🔍 SEARCH NAMA WARGA
        if ($request->search) {
            $query->whereHas('warga', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        // 🔎 FILTER PROGRAM
        if ($request->program_id) {
            $query->where('program_id', $request->program_id);
        }

        $penerima = $query->paginate(10)->withQueryString();
        $program  = Program::orderBy('nama_program')->get();

        return view('pages.penerima.index', compact('penerima', 'program'));
    }

    public function create()
    {
        $program = Program::orderBy('nama_program')->get();
        $warga   = Warga::orderBy('nama')->get();

        return view('pages.penerima.create', compact('program', 'warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
            'keterangan' => 'nullable'
        ]);

        PenerimaBantuan::create($request->all());

        return redirect()->route('penerima.index')
            ->with('success', 'Penerima bantuan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $penerima = PenerimaBantuan::findOrFail($id);
        $program  = Program::orderBy('nama_program')->get();
        $warga    = Warga::orderBy('nama')->get();

        return view('pages.penerima.edit', compact('penerima', 'program', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'program_id' => 'required',
            'warga_id'   => 'required',
            'keterangan' => 'nullable'
        ]);

        $penerima = PenerimaBantuan::findOrFail($id);
        $penerima->update($request->all());

        return redirect()->route('penerima.index')
            ->with('success', 'Data penerima berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerima = PenerimaBantuan::findOrFail($id);
        $penerima->delete();

        return redirect()->route('penerima.index')
            ->with('success', 'Data penerima berhasil dihapus.');
    }
}
