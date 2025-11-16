<?php
namespace Database\Seeders;

use App\Models\Pendaftar;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    public function run(): void
    {
        Warga::create([
            'no_ktp'        => '123456789',
            'nama'          => 'Budi Santoso',
            'jenis_kelamin' => 'Laki-laki',
            'agama'         => 'Islam',
            'pekerjaan'     => 'Karyawan Swasta',
            'telp'          => '081234567890',
            'email'         => 'budi@gmail.com',
        ]);

        Program::create([
            'kode'         => 'PB01',
            'nama_program' => 'Bantuan Sembako',
            'tahun'        => 2024,
            'deskripsi'    => 'Program bantuan paket sembako untuk warga miskin',
            'anggaran'     => 50000000,
            'media'        => null,
        ]);

        Pendaftar::create([
            'warga_id'   => $warga->warga_id,
            'program_id' => $program->program_id,
            'status'     => 'pending',
            'berkas'     => null,
        ]);
    }
}
