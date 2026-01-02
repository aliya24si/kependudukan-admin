<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\Media;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        // ===============================
        // PB001
        // ===============================
        $p1 = Program::create([
            'kode'         => 'PB001',
            'nama_program' => 'Bantuan Langsung Tunai Desa',
            'tahun'        => 2024,
            'deskripsi'    => 'Bantuan tunai untuk warga desa kurang mampu',
            'anggaran'     => 30000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p1->program_id,
            'file_name' => 'bantuan-langsung-tunai-desa.jpeg',
            'file_path' => 'dummy/program/bantuan-langsung-tunai-desa.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);

        // ===============================
        // PB002
        // ===============================
        $p2 = Program::create([
            'kode'         => 'PB002',
            'nama_program' => 'Program Keluarga Harapan',
            'tahun'        => 2024,
            'deskripsi'    => 'Program bantuan sosial bersyarat untuk keluarga miskin',
            'anggaran'     => 40000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p2->program_id,
            'file_name' => 'program-keluarga-harapan.jpeg',
            'file_path' => 'dummy/program/program-keluarga-harapan.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);

        // ===============================
        // PB003
        // ===============================
        $p3 = Program::create([
            'kode'         => 'PB003',
            'nama_program' => 'Bantuan Pangan Non Tunai',
            'tahun'        => 2024,
            'deskripsi'    => 'Bantuan pangan melalui saldo elektronik',
            'anggaran'     => 25000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p3->program_id,
            'file_name' => 'bantuan-pangan-non-tunai.jpeg',
            'file_path' => 'dummy/program/bantuan-pangan-non-tunai.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);

        // ===============================
        // PB004
        // ===============================
        $p4 = Program::create([
            'kode'         => 'PB004',
            'nama_program' => 'Bantuan Modal UMKM',
            'tahun'        => 2024,
            'deskripsi'    => 'Bantuan modal usaha bagi UMKM',
            'anggaran'     => 50000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p4->program_id,
            'file_name' => 'bantuan-modal-umkm.jpeg',
            'file_path' => 'dummy/program/bantuan-modal-umkm.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);

        // ===============================
        // PB005
        // ===============================
        $p5 = Program::create([
            'kode'         => 'PB005',
            'nama_program' => 'Beasiswa Pendidikan Warga Tidak Mampu',
            'tahun'        => 2024,
            'deskripsi'    => 'Bantuan biaya pendidikan bagi warga kurang mampu',
            'anggaran'     => 35000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p5->program_id,
            'file_name' => 'Beasiswa-Pendidikan-Warga-Tidak-Mampu.jpeg',
            'file_path' => 'dummy/program/Beasiswa-Pendidikan-Warga-Tidak-Mampu.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);

        // ===============================
        // PB006
        // ===============================
        $p6 = Program::create([
            'kode'         => 'PB006',
            'nama_program' => 'Bantuan Untuk Orang Kurang Mampu',
            'tahun'        => 2024,
            'deskripsi'    => 'Bantuan sosial untuk masyarakat kurang mampu',
            'anggaran'     => 30000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p6->program_id,
            'file_name' => 'bantuan-untuk-orang-kurang-mampu.jpeg',
            'file_path' => 'dummy/program/bantuan-untuk-orang-kurang-mampu.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);

        // ===============================
        // PB007
        // ===============================
        $p7 = Program::create([
            'kode'         => 'PB007',
            'nama_program' => 'Bantuan Panti Asuhan',
            'tahun'        => 2024,
            'deskripsi'    => 'Bantuan operasional untuk panti asuhan',
            'anggaran'     => 20000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p7->program_id,
            'file_name' => 'bantuan-panti-asuhan.jpeg',
            'file_path' => 'dummy/program/bantuan-panti-asuhan.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);

        // ===============================
        // PB008
        // ===============================
        $p8 = Program::create([
            'kode'         => 'PB008',
            'nama_program' => 'Bantuan Bencana Alam',
            'tahun'        => 2024,
            'deskripsi'    => 'Bantuan darurat untuk korban bencana alam',
            'anggaran'     => 45000000,
        ]);

        Media::create([
            'ref_table' => 'programs',
            'ref_id'    => $p8->program_id,
            'file_name' => 'bantuan-bencana-alam.jpeg',
            'file_path' => 'dummy/program/bantuan-bencana-alam.jpeg',
            'file_type' => 'image/jpeg',
            'file_size' => null,
        ]);
    }
}
