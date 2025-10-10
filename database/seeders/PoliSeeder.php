<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('poli')->insert([
            ['nama_poli' => 'Poli Umum'],
            ['nama_poli' => 'Poli Gigi'],
        ]);
    }
}
