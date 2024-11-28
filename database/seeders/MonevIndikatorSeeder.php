<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonevIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Indikator
        DB::table('monev_indikators')->delete();

        DB::table('monev_indikators')->insert(array (
            0 => array (
                'id' => 1, 
                'indikator' => 'Indikator 1',
                'id_komponen' => 1, 
                'target' => '1', 
                'satuan' => 'database'                
            ),
            1 => array (
                'id' => 2, 
                'indikator' => 'Indikator 3',
                'id_komponen' => 2, 
                'target' => '5000', 
                'satuan' => 'petani'
            ),
            2 => array (
                'id' => 3, 
                'indikator' => 'Indikator 5',
                'id_komponen' => 3, 
                'target' => '78', 
                'satuan' => 'tanpa satuan'
            )
        ));
    }
}
