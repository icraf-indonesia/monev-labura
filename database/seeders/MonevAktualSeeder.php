<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonevAktualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kegiatans')->delete();

        DB::table('kegiatans')->insert(array (
            0 => array (
                'id' => 1, 
                'id_indikator' => 1, 
                'tahun' => '2023', 
                'aktual' => '0', 
                'dokumen pendukung' => '',
                'keterangan' => 'Baseline' 
            ),
            1 => array (
                'id' => 2, 
                'id_indikator' => 2, 
                'tahun' => '2023', 
                'aktual' => '1000', 
                'dokumen pendukung' => '',
                'keterangan' => 'Baseline'
            ),
            2 => array (
                'id' => 3, 
                'id_indikator' => 3, 
                'tahun' => '2023', 
                'aktual' => '65', 
                'dokumen pendukung' => '',
                'keterangan' => 'Baseline'
            ),
            3 => array (
                'id' => 1, 
                'id_indikator' => 1, 
                'tahun' => '2024', 
                'aktual' => '0', 
                'dokumen pendukung' => '',
                'keterangan' => 'Aktual' 
            ),
            4 => array (
                'id' => 2, 
                'id_indikator' => 2, 
                'tahun' => '2024', 
                'aktual' => '2400', 
                'dokumen pendukung' => '',
                'keterangan' => 'Aktual'
            ),
            5 => array (
                'id' => 3, 
                'id_indikator' => 3, 
                'tahun' => '2024', 
                'aktual' => '65', 
                'dokumen pendukung' => '',
                'keterangan' => 'Aktual'
            ),
        ));
    }
}
