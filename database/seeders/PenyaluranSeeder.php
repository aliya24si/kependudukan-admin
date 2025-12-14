<?php

namespace Database\Seeders;

use App\Models\PenerimaBantuan;
use App\Models\RiwayatPenyaluran;
use App\Models\Pendaftar;
use App\Models\Media;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PenyaluranSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $fotoPenyaluran = glob(public_path('dummy/penyaluran/*'));

        $pendaftarDiterima = Pendaftar::where('status', 'diterima')->get();

        foreach ($pendaftarDiterima as $pendaftar) {

            $penerima = PenerimaBantuan::create([
                'program_id' => $pendaftar->program_id,
                'warga_id'   => $pendaftar->warga_id,
                'keterangan' => 'Layak menerima bantuan',
            ]);

            $penyaluran = RiwayatPenyaluran::create([
                'penerima_id' => $penerima->penerima_id,
                'tahap_ke'    => rand(1, 3),
                'tanggal'     => now()->subDays(rand(1, 90)),
                'nilai'       => rand(300_000, 2_000_000),
            ]);

            // 👉 1–3 foto penyaluran
            $fotoRandom = $faker->randomElements($fotoPenyaluran, rand(1, 3));

            foreach ($fotoRandom as $foto) {
                Media::create([
                    'ref_table' => 'penyaluran_bantuan',
                    'ref_id'    => $penyaluran->penyaluran_id,
                    'file_name' => basename($foto),
                    'file_path' => 'dummy/penyaluran/' . basename($foto),
                    'file_type' => 'image',
                ]);
            }
        }
    }
}
