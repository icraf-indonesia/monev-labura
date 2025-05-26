<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /***** UPDATE *****/
       $this->call(MonevCapaianSeeder::class);
       $this->call(MonevIndikatorKeluaranSeeder::class);
       $this->call(MonevIndikatorSeeder::class);
       $this->call(MonevInstansiSeeder::class);
       $this->call(MonevKegiatanSeeder::class);
       $this->call(MonevSubkegiatanSeeder::class);
       $this->call(MonevProgramSeeder::class);
       $this->call(MonevKomponenSeeder::class);
       $this->call(MonevAktualSeeder::class);
       $this->call(UsersTableSeeder::class);
       $this->call(ListIndikatorDampakSeeder::class);
       $this->call(ListIndikatorKeluaranSeeder::class);
       /***** END UPDATE *****/
    }
}
