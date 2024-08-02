<?php

namespace Database\Seeders;

// use App\Models\MonevKomponen;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonevKomponenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Komponen

        DB::table('komponens')->delete();

        DB::table('komponens')->insert(array (
            0 => array ('id' => 1, 'komponen' => 'Penguatan data, penguatan koordinasi, dan infrastruktur'),
            1 => array ('id' => 2, 'komponen' => 'Peningkatan kapasitas dan kapabilitas pekebun'),
            2 => array ('id' => 3, 'komponen' => 'Pengelolaan dan pemantauan lingkungan'),
            3 => array ('id' => 4, 'komponen' => 'Tata kelola perkebunan dan penanganan sengketa'),
            4 => array ('id' => 5, 'komponen' => 'Dukungan percepatan pelaksanaan sertifikasi ISPO dan peningkatan akses pasar produk kelapa sawit')
        ));
    }
}
