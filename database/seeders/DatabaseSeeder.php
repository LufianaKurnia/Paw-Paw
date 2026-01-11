<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ==============================
        // 1. BIKIN USER (Aman, tidak reset password/data jika user sudah ada)
        // ==============================

        // User 1: Hana
        $hana = User::firstOrCreate(
            ['email' => 'hana@pawpaw.com'],
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
            ['email' => 'hani@pawpaw.com'],
            [
                'name' => 'Hani Sobarni',
                'password' => Hash::make('12345678'),
                'role' => 'mitra',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ==============================
        // 2. BIKIN TOKO (Aman, RATING TIDAK AKAN RESET)
        // ==============================

        // --- Toko Hana ---
        $tokoHana = DB::table('petshops')->where('user_id', $hana->id)->first();

        if (!$tokoHana) {
            DB::table('petshops')->insert([
                'user_id' => $hana->id,
                'nama_toko' => 'Ello Petshop Sumedang',
                'alamat' => 'Jl. Angkrek no. 138, Sumedang',
                'rating' => 0, // Hanya 0 saat PERTAMA kali dibuat
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // --- Toko Hani ---
        $tokoHani = DB::table('petshops')->where('user_id', $hani->id)->first();

        if (!$tokoHani) {
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