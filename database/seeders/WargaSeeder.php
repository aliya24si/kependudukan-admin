<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        Warga::create([
            'no_ktp' => '123456789',
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Melati No. 1',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'pekerjaan' => 'Karyawan Swasta',
            'telp' => '081234567890',
            'email' => 'budi@gmail.com'
        ]);

        Warga::create([
            'no_ktp' => '987654321',
            'nama' => 'Siti Aminah',
            'alamat' => 'Jl. Mawar No. 2',
            'jenis_kelamin' => 'Perempuan',
            'agama' => 'Islam',
            'pekerjaan' => 'Ibu Rumah Tangga',
            'telp' => '081298765432',
            'email' => 'minah@gmail.com'
        ]);

        Warga::create([
            'no_ktp' => '123654321',
            'nama' => 'Raja Muiz',
            'alamat' => 'Jl. Rowosari No. 10',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'pekerjaan' => 'Mahasiswa',
            'telp' => '081378765432',
            'email' => 'muiz@gmail.com'
        ]);

        Warga::create([
            'no_ktp' => '987999321',
            'nama' => 'Nurul Kholifah',
            'alamat' => 'Jl. Patriasari No. 2',
            'jenis_kelamin' => 'Perempuan',
            'agama' => 'Islam',
            'pekerjaan' => 'Ibu Rumah Tangga',
            'telp' => '081298700032',
            'email' => 'khofifah@gmail.com'
        ]);

        Warga::create([
            'no_ktp' => '987652356',
            'nama' => 'Marjoko',
            'alamat' => 'Jl. Panam No. 2',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'pekerjaan' => 'Karyawan Swasta',
            'telp' => '081906765432',
            'email' => 'marjokotok@gmail.com'
        ]);
    }
}
