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
        DB::table('monev_aktuals')->delete();

        DB::table('monev_aktuals')->insert(array (
            0 => array (
                'id' => 1, 
                'id_indikator' => 1, 
                'tahun' => '2023', 
                'aktual' => '0', 
                'dokumen_pendukung' => '',
                'keterangan' => 'Baseline' 
            ),
            1 => array (
                'id' => 2, 
                'id_indikator' => 2, 
                'tahun' => '2023', 
                'aktual' => '1000', 
                'dokumen_pendukung' => '',
                'keterangan' => 'Baseline'
            ),
            2 => array (
                'id' => 3, 
                'id_indikator' => 3, 
                'tahun' => '2023', 
                'aktual' => '65', 
                'dokumen_pendukung' => '',
                'keterangan' => 'Baseline'
            ),
            3 => array (
                'id' => 4, 
                'id_indikator' => 1, 
                'tahun' => '2024', 
                'aktual' => '0', 
                'dokumen_pendukung' => '',
                'keterangan' => 'Aktual' 
            ),
            4 => array (
                'id' => 5, 
                'id_indikator' => 2, 
                'tahun' => '2024', 
                'aktual' => '2400', 
                'dokumen_pendukung' => '',
                'keterangan' => 'Aktual'
            ),
            5 => array (
                'id' => 6, 
                'id_indikator' => 3, 
                'tahun' => '2024', 
                'aktual' => '65', 
                'dokumen_pendukung' => '',
                'keterangan' => 'Aktual'
            ),
        ));
    }
}
