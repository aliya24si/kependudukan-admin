<?php

namespace Database\Seeders;

use App\Models\Pendaftar;
use App\Models\Program;
use App\Models\Warga;
use App\Models\VerifikasiLapangan;
use App\Models\Media;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PendaftarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 🔥 ambil semua program yang SUDAH ADA
        $programs = Program::all();

        if ($programs->isEmpty()) {
            throw new \Exception('Program belum ada. Jalankan ProgramSeeder dulu.');
        }

        // 🔥 ambil dummy berkas pendaftar
        $dummyFiles = glob(public_path('dummy/pendaftar/*'));

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

            $program = $programs->random();

            $pendaftar = Pendaftar::create([
                'warga_id'   => $warga->warga_id,
                'program_id' => $program->program_id,
                'status'     => $faker->randomElement(['pending', 'diterima', 'ditolak']),
            ]);

            // ===============================
            // MEDIA DUMMY (1–3 FILE)
            // ===============================
            if (!empty($dummyFiles)) {

                $files = $faker->randomElements(
                    $dummyFiles,
                    rand(1, min(3, count($dummyFiles)))
                );

                foreach ($files as $file) {
                    Media::create([
                        'ref_table' => 'pendaftar',
                        'ref_id'    => $pendaftar->pendaftar_id,
                        'file_name' => basename($file),
                        'file_path' => 'dummy/pendaftar/' . basename($file),
                        'file_type' => 'image/jpeg',
                        'file_size' => filesize($file),
                    ]);
                }
            }

            // ===============================
            // VERIFIKASI LAPANGAN
            // ===============================
            VerifikasiLapangan::create([
                'pendaftar_id' => $pendaftar->pendaftar_id,
                'petugas'      => $faker->name(),
                'tanggal'      => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'catatan'      => $faker->sentence(),
                'skor'         => $faker->numberBetween(40, 100),
            ]);
        }
    }
}
