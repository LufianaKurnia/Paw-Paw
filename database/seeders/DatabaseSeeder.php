<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ==============================
        // 1. BIKIN USER (Owner)
        // ==============================

        // User 1: Hana
        $hana = User::firstOrCreate(
            ['email' => 'hana@pawpaw.com'], // Cek email ini
            [
                'name' => 'Hana Sobarna',
                'password' => Hash::make('12345678'),
                'role' => 'mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // User 2: Hani
        $hani = User::firstOrCreate(
            ['email' => 'hani@pawpaw.com'], // Cek email ini
            [
                'name' => 'Hani Sobarni',
                'password' => Hash::make('12345678'),
                'role' => 'mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ==============================
        // 2. BIKIN TOKO (Petshop)
        // ==============================

        $cekTokoHana = DB::table('petshops')->where('user_id', $hana->id)->first();

        if (!$cekTokoHana) {
            DB::table('petshops')->insert([
                'user_id' => $hana->id,
                'nama_toko' => 'Ello Petshop Sumedang',
                'alamat' => 'Jl. Angkrek no. 138, Sumedang',
                'rating' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --- Toko Hani ---
        $cekTokoHani = DB::table('petshops')->where('user_id', $hani->id)->first();

        if (!$cekTokoHani) {
            DB::table('petshops')->insert([
                'user_id' => $hani->id,
                'nama_toko' => 'Elli Petshop Bandung',
                'alamat' => 'Jl. Dago Atas No. 10, Bandung',
                'rating' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}