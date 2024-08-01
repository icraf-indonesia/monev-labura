<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonevInstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('instansis')->delete();

        DB::table('instansis')->insert(array (
            0 => array ('id' => 1, 'instansi' => 'Bappeda'),
            1 => array ('id' => 2, 'instansi' => 'BPBD'),
            2 => array ('id' => 3, 'instansi' => 'BPS'),
            3 => array ('id' => 4, 'instansi' => 'Dinas Ketenagakerjaan dan Perindustrian'),
            4 => array ('id' => 5, 'instansi' => 'Dinas Komunikasi dan Informatika'),
            5 => array ('id' => 6, 'instansi' => 'Dinas Lingkungan Hidup'),
            6 => array ('id' => 7, 'instansi' => 'Dinas Pekerjaan Umum dan Penataan Ruang'),
            7 => array ('id' => 8, 'instansi' => 'Dinas Pemadam Kebakaran dan Penyelamatan'),
            8 => array ('id' => 9, 'instansi' => 'Dinas Perdagangan, Koperasi, dan UKM'),
            9 => array ('id' => 10, 'instansi' => 'Dinas Pertanian'),
            10 => array ('id' => 11, 'instansi' => 'Dinas Perumahan dan Permukiman'),
            11 => array ('id' => 12, 'instansi' => 'DPMPTSP'),
            12 => array ('id' => 13, 'instansi' => 'KPH'),
            13 => array ('id' => 14, 'instansi' => 'Perekonomian Setdakab/Sosbud '),
            14 => array ('id' => 15, 'instansi' => 'ATR/BPN')
        ));
    }
}
