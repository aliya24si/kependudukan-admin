<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use App\Models\Program;
use App\Models\Warga;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1. Daftar nama program (8 data)
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

        // 2. Insert 8 program (bukan 100)
        $programs = [];
        foreach ($programNames as $index => $name) {
            $programs[] = Program::create([
                'kode'         => 'PB' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama_program' => $name,
                'tahun'        => $faker->numberBetween(2020, 2025),
                'deskripsi'    => $faker->sentence(),
                'anggaran'     => $faker->numberBetween(1000000, 50000000),
                'media'        => null,
            ]);
        }

        // 3. Insert 100 Warga + Pendaftar
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

            // Pilih program secara acak dari 8 data yang sudah dibuat
            $randomProgram = $programs[array_rand($programs)];

            Pendaftar::create([
                'warga_id'   => $warga->warga_id,
                'program_id' => $randomProgram->program_id,
                'status'     => $faker->randomElement(['pending', 'diterima', 'ditolak']),
            ]);
        }
    }
}
