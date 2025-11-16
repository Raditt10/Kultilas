<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengguna')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'nama_lengkap' => 'Administrator',
                'role' => 'admin',
                'terakhir_login' => now(),
            ],
            [
                'username' => 'pembina1',
                'password' => Hash::make('pembina123'),
                'nama_lengkap' => 'Budi Santoso',
                'role' => 'pembina',
                'terakhir_login' => null,
            ],
            [
                'username' => 'pelatih1',
                'password' => Hash::make('pelatih123'),
                'nama_lengkap' => 'Siti Aminah',
                'role' => 'pelatih',
                'terakhir_login' => null,
            ],
        ]);
    }
}
