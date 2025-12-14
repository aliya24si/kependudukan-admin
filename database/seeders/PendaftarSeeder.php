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

        // 1. Daftar nama program
        $programNames = [
            'Bantuan Langsung Tunai Desa',
            'Program Keluarga Harapan',
            'Bantuan Pangan Non Tunai',
            'Bantuan Modal UMKM',
            'Beasiswa Pendidikan Warga Tidak Mampu',
            'Bantuan Untuk Orang Kurang Mampu',
            'Bantuan Panti Asuhan',
            'Bantuan Bencana Alam',
        ];

        // 2. Insert 8 program
        $programs = [];
        foreach ($programNames as $index => $name) {
            $programs[] = Program::create([
                'kode'         => 'PB' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama_program' => $name,
                'tahun'        => $faker->numberBetween(2020, 2025),
                'deskripsi'    => $faker->sentence(),
                'anggaran'     => $faker->numberBetween(1_000_000, 50_000_000),
                'media'        => null,
            ]);
        }

        // 3. Insert 100 Warga + Pendaftar + Verifikasi
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

            // ✅ VERIFIKASI LAPANGAN
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
