<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Poli;
use App\Models\User;
use App\Models\JadwalPeriksa;

class DemoPoliSeeder extends Seeder
{
    public function run(): void
    {
        // ---- 1. Buat Data Poli ----
        $poliUmum = Poli::create([
            'nama_poli' => 'Poli Umum',
            'keterangan' => 'Pelayanan pemeriksaan umum'
        ]);

        $poliGigi = Poli::create([
            'nama_poli' => 'Poli Gigi',
            'keterangan' => 'Pelayanan gigi dan mulut'
        ]);

        // ---- 2. Buat Dokter ----
        $dokterUmum = User::create([
            'nama' => 'dr. Andi',
            'alamat' => 'Jl. Melati No. 1',
            'no_ktp' => '1234567890123456',
            'no_hp' => '081234567890',
            'role' => 'dokter',
            'id_poli' => $poliUmum->id,
            'email' => 'dokter.andi@example.com',
            'password' => Hash::make('password')
        ]);

        $dokterGigi = User::create([
            'nama' => 'drg. Budi',
            'alamat' => 'Jl. Mawar No. 2',
            'no_ktp' => '9876543210987654',
            'no_hp' => '082233445566',
            'role' => 'dokter',
            'id_poli' => $poliGigi->id,
            'email' => 'dokter.budi@example.com',
            'password' => Hash::make('password')
        ]);

        // ---- 3. Buat Jadwal Periksa ----
        JadwalPeriksa::create([
            'id_dokter' => $dokterUmum->id,
            'hari' => 'Senin',
            'jam_mulai' => '08:00',
            'jam_selesai' => '12:00'
        ]);

        JadwalPeriksa::create([
            'id_dokter' => $dokterUmum->id,
            'hari' => 'Rabu',
            'jam_mulai' => '09:00',
            'jam_selesai' => '13:00'
        ]);

        JadwalPeriksa::create([
            'id_dokter' => $dokterGigi->id,
            'hari' => 'Selasa',
            'jam_mulai' => '10:00',
            'jam_selesai' => '14:00'
        ]);

        // ---- 4. Buat Pasien Contoh ----
        User::create([
            'nama' => 'Pasien Satu',
            'alamat' => 'Jl. Kenanga No. 3',
            'no_ktp' => '1111222233334444',
            'no_hp' => '083344556677',
            'no_rm' => '202511-001',
            'role' => 'pasien',
            'email' => 'pasien@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
