<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use App\Models\Program;
use App\Models\Warga;
use App\Models\VerifikasiLapangan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 🔥 Mapping nama program → gambar
        $programsData = [
            [
                'nama'  => 'Bantuan Langsung Tunai Desa',
                'image' => 'dummy/program/bantuan-langsung-tunai-desa.jpeg',
            ],
            [
                'nama'  => 'Program Keluarga Harapan',
                'image' => 'dummy/program/program-keluarga-harapan.jpeg',
            ],
            [
                'nama'  => 'Bantuan Pangan Non Tunai',
                'image' => 'dummy/program/bantuan-pangan-non-tunai.jpeg',
            ],
            [
                'nama'  => 'Bantuan Modal UMKM',
                'image' => 'dummy/program/bantuan-modal-umkm.jpeg',
            ],
            [
                'nama'  => 'Beasiswa Pendidikan Warga Tidak Mampu',
                'image' => 'dummy/program/Beasiswa-Pendidikan-Warga-Tidak-Mampu.jpeg',
            ],
            [
                'nama'  => 'Bantuan Untuk Orang Kurang Mampu',
                'image' => 'dummy/program/bantuan-untuk-orang-kurang-mampu.jpeg',
            ],
            [
                'nama'  => 'Bantuan Panti Asuhan',
                'image' => 'dummy/program/bantuan-panti-asuhan.jpeg',
            ],
            [
                'nama'  => 'Bantuan Bencana Alam',
                'image' => 'dummy/program/bantuan-bencana-alam.jpeg',
            ],
        ];

        // ✅ Insert program + gambar
        $programs = [];
        foreach ($programsData as $index => $p) {
            $programs[] = Program::create([
                'kode'         => 'PB' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama_program' => $p['nama'],
                'tahun'        => $faker->numberBetween(2020, 2025),
                'deskripsi'    => $faker->sentence(),
                'anggaran'     => $faker->numberBetween(1_000_000, 50_000_000),
                'media'        => $p['image'], // 🔥 PATH GAMBAR
            ]);
        }

        // ✅ 100 Warga + Pendaftar + Verifikasi
        for ($i = 1; $i <= 100; $i++) {

            $warga = Warga::create([
                'no_ktp'        => $faker->numerify('3276##########'),
                'nama'          => $faker->name(),
                'alamat'        => $faker->streetAddress(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                'pekerjaan'     => $faker->jobTitle(),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
            ]);

            $randomProgram = $programs[array_rand($programs)];

            $pendaftar = Pendaftar::create([
                'warga_id'   => $warga->warga_id,
                'program_id' => $randomProgram->program_id,
                'status'     => $faker->randomElement(['pending', 'diterima', 'ditolak']),
            ]);

            VerifikasiLapangan::create([
                'pendaftar_id' => $pendaftar->pendaftar_id,
                'petugas'      => $faker->name(),
                'tanggal'      => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'catatan'      => $faker->randomElement([
                    'Data sesuai dengan kondisi lapangan',
                    'Rumah layak dibantu',
                    'Perlu verifikasi lanjutan',
                    'Penghasilan rendah, direkomendasikan',
                    'Tidak sesuai kriteria program',
                ]),
                'skor'         => $faker->numberBetween(10, 100),
            ]);
        }
    }
}
