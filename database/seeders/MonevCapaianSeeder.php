<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonevCapaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Capaian
        DB::table('monev_capaians')->delete();

        DB::table('monev_capaians')->insert(array (
            0 => array (
                'id' => 1, 
                'id_keluaran' => '1',
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            )
        ));
    }
}
