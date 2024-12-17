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
                'id_keluaran' => 1,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            1 => array (
                'id' => 2, 
                'id_keluaran' => 2,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            2 => array (
                'id' => 3, 
                'id_keluaran' => 3,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            3 => array (
                'id' => 4, 
                'id_keluaran' => 4,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            4 => array (
                'id' => 5, 
                'id_keluaran' => 5,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            5 => array (
                'id' => 6, 
                'id_keluaran' => 6,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            6 => array (
                'id' => 7, 
                'id_keluaran' => 7,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            7 => array (
                'id' => 8, 
                'id_keluaran' => 8,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            8 => array (
                'id' => 9, 
                'id_keluaran' => 9,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            9 => array (
                'id' => 10, 
                'id_keluaran' => 10,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            10 => array (
                'id' => 11, 
                'id_keluaran' => 11,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            11 => array (
                'id' => 12, 
                'id_keluaran' => 12,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            12 => array (
                'id' => 13, 
                'id_keluaran' => 13,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            13 => array (
                'id' => 14, 
                'id_keluaran' => 14,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            14 => array (
                'id' => 15, 
                'id_keluaran' => 15,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            15 => array (
                'id' => 16, 
                'id_keluaran' => 16,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            16 => array (
                'id' => 17, 
                'id_keluaran' => 17,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            17 => array (
                'id' => 18, 
                'id_keluaran' => 18,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            18 => array (
                'id' => 19, 
                'id_keluaran' => 19,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            19 => array (
                'id' => 20, 
                'id_keluaran' => 20,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            20 => array (
                'id' => 21, 
                'id_keluaran' => 21,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            21 => array (
                'id' => 22, 
                'id_keluaran' => 22,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            22 => array (
                'id' => 23, 
                'id_keluaran' => 23,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            23 => array (
                'id' => 24, 
                'id_keluaran' => 24,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            24 => array (
                'id' => 25, 
                'id_keluaran' => 25,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            25 => array (
                'id' => 26, 
                'id_keluaran' => 26,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            26 => array (
                'id' => 27, 
                'id_keluaran' => 27,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            27 => array (
                'id' => 28, 
                'id_keluaran' => 28,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            28 => array (
                'id' => 29, 
                'id_keluaran' => 29,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            29 => array (
                'id' => 30, 
                'id_keluaran' => 30,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            30 => array (
                'id' => 31, 
                'id_keluaran' => 31,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            31 => array (
                'id' => 32, 
                'id_keluaran' => 32,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            32 => array (
                'id' => 33, 
                'id_keluaran' => 33,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            33 => array (
                'id' => 34, 
                'id_keluaran' => 34,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            34 => array (
                'id' => 35, 
                'id_keluaran' => 35,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            35 => array (
                'id' => 36, 
                'id_keluaran' => 36,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            36 => array (
                'id' => 37, 
                'id_keluaran' => 37,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            37 => array (
                'id' => 38, 
                'id_keluaran' => 38,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            38 => array (
                'id' => 39, 
                'id_keluaran' => 39,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            39 => array (
                'id' => 40, 
                'id_keluaran' => 40,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            40 => array (
                'id' => 41, 
                'id_keluaran' => 41,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            41 => array (
                'id' => 42, 
                'id_keluaran' => 42,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            42 => array (
                'id' => 43, 
                'id_keluaran' => 43,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            43 => array (
                'id' => 44, 
                'id_keluaran' => 44,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            44 => array (
                'id' => 45, 
                'id_keluaran' => 45,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            45 => array (
                'id' => 46, 
                'id_keluaran' => 46,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            46 => array (
                'id' => 47, 
                'id_keluaran' => 47,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            47 => array (
                'id' => 48, 
                'id_keluaran' => 48,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            48 => array (
                'id' => 49, 
                'id_keluaran' => 49,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            49 => array (
                'id' => 50, 
                'id_keluaran' => 50,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            50 => array (
                'id' => 51, 
                'id_keluaran' => 51,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            51 => array (
                'id' => 52, 
                'id_keluaran' => 52,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            52 => array (
                'id' => 53, 
                'id_keluaran' => 53,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            53 => array (
                'id' => 54, 
                'id_keluaran' => 54,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            54 => array (
                'id' => 55, 
                'id_keluaran' => 55,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            55 => array (
                'id' => 56, 
                'id_keluaran' => 56,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            56 => array (
                'id' => 57, 
                'id_keluaran' => 57,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            57 => array (
                'id' => 58, 
                'id_keluaran' => 58,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            58 => array (
                'id' => 59, 
                'id_keluaran' => 59,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            59 => array (
                'id' => 60, 
                'id_keluaran' => 60,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            60 => array (
                'id' => 61, 
                'id_keluaran' => 61,
                'tahun' => 2024,
                'semester' => 1,
                'capaian' => 100,
                'id_stakeholder' => 1,
                'sumber_pembiayaan' => 'APBD',
                'status' => 0
            ),
            61 => array (
                'id' => 62, 
                'id_keluaran' => 62,
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
