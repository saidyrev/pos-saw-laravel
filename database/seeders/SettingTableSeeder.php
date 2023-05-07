<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengaturan')->insert([
            'id_pengaturan' => 1,
            'nama_kafe' => 'Cerita Kopi',
            'alamat' => 'Jl. Banua Anyar',
            'instagram' => '@ceritakopi.bdj',
            'tipe_nota' => 1, //nota kecil
            'path_logo' => '/img/logo.png',
        ]);
    }
}
