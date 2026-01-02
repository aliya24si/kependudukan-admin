<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // --- 1. USER ADMIN ---
        User::create([
            'name'     => 'Aliya',
            'email'    => 'Aliya@gmail.com',
            'password' => Hash::make('aliyapcr'),
            'role'     => 'admin', // menambahkan role admin
            'profile_picture'  => 'assets-admin/images/layout_img/aliya-safwa-min.jpg',
        ]);

        // --- 2. FAKER INDONESIA ---
        $faker = Faker::create('id_ID');

        // --- 3. GENERATE 100 USER PALSU ---
        for ($i = 0; $i < 100; $i++) {
            // Tentukan role secara acak, misalnya 'user' atau 'moderator'
            $role = ($i % 5 === 0) ? 'admin' : 'staff'; // Setiap 5 user adalah moderator

            User::create([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
                'role'     => $role, // menambahkan role yang sudah ditentukan
            ]);
        }
    }
}
