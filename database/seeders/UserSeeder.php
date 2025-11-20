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
            'name'     => 'Admin',
            'email'    => 'Admin@gmail.com',
            'password' => Hash::make('Admin'),
        ]);

        // --- 2. FAKER INDONESIA ---
        $faker = Faker::create('id_ID');

        // --- 3. GENERATE 100 USER PALSU ---
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => Hash::make('password123'),
            ]);
        }
    }
}

