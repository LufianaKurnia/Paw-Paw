<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. BIKIN USER (OWNER)

        // User 1: Hana
        $hanaId = DB::table('users')->insertGetId([
            'name' => 'Hana Sobarna',
            'email' => 'hana@pawpaw.com',
            'password' => Hash::make('12345678'),
            'role' => 'mitra', // Pastikan role ada
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // User 2: Hani
        $haniId = DB::table('users')->insertGetId([
            'name' => 'Hani Sobarni',
            'email' => 'hani@pawpaw.com',
            'password' => Hash::make('12345678'),
            'role' => 'mitra',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. BIKIN TOKO (PETSHOP)

        // Toko Hana
        $elloId = DB::table('petshops')->insertGetId([
            'user_id' => $hanaId,
            'nama_toko' => 'Ello Petshop Sumedang',
            'alamat' => 'Jl. Angkrek no. 138, Sumedang',
            'rating' => 4.5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Toko Hani
        $elliId = DB::table('petshops')->insertGetId([
            'user_id' => $haniId,
            'nama_toko' => 'Elli Petshop Bandung',
            'alamat' => 'Jl. Dago Atas No. 10, Bandung',
            'rating' => 5.0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}