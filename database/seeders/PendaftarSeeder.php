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

        for ($i = 1; $i <= 100; $i++) {

            // Insert Warga
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

            // Insert Program
            $program = Program::create([
                'kode'         => 'PB' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_program' => "Program Batuan #$i",
                'tahun'        => $faker->numberBetween(2020, 2025),
                'deskripsi'    => $faker->sentence(),
                'anggaran'     => $faker->numberBetween(1000000, 50000000),
                'media'        => null,
            ]);

            // Insert Pendaftar (relasi)
            Pendaftar::create([
                'warga_id'   => $warga->warga_id,     // sesuaikan jika primary key beda
                'program_id' => $program->program_id, // sesuaikan jika primary key beda
                'status'     => $faker->randomElement(['pending', 'diterima', 'ditolak']),
                'berkas'     => null,
            ]);
        }
    }
}
