<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        Program::create([
            'kode' => 'PB01',
            'nama_program' => 'Bantuan Sembako',
            'tahun' => 2024,
            'deskripsi' => 'Program bantuan paket sembako untuk warga miskin',
            'anggaran' => 50000000,
            'media' => null
        ]);

        Program::create([
            'kode' => 'PB02',
            'nama_program' => 'Bantuan Pendidikan',
            'tahun' => 2024,
            'deskripsi' => 'Bantuan biaya pendidikan untuk siswa kurang mampu',
            'anggaran' => 30000000,
            'media' => null
        ]);

        Program::create([
            'kode' => 'PB03',
            'nama_program' => 'Bantuan Kesehatan',
            'tahun' => 2025,
            'deskripsi' => 'Bantuan biaya kesehatan untuk warga miskin',
            'anggaran' => 70000000,
            'media' => null
        ]);
    }
}
