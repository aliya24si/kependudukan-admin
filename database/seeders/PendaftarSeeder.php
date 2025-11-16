<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftar;

class PendaftarSeeder extends Seeder
{
    public function run(): void
    {
        Pendaftar::create([
            'warga_id' => 1,
            'program_id' => 1,
            'status' => 'pending',
            'berkas' => null
        ]);

        Pendaftar::create([
            'warga_id' => 2,
            'program_id' => 2,
            'status' => 'diterima',
            'berkas' => null
        ]);

        Pendaftar::create([
            'warga_id' => 3,
            'program_id' => 2,
            'status' => 'diterima',
            'berkas' => null
        ]);

        Pendaftar::create([
            'warga_id' => 4,
            'program_id' => 3,
            'status' => 'ditolak',
            'berkas' => null
        ]);

        Pendaftar::create([
            'warga_id' => 5,
            'program_id' => 3,
            'status' => 'pending',
            'berkas' => null
        ]);
    }
}
