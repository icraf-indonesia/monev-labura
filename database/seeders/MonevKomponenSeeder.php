<?php

namespace Database\Seeders;

use App\Models\MonevKomponen;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        MonevKomponen::create([
            'komponen' => 'Penguatan data, penguatan koordinasi, dan infrastruktur'
        ]);
        MonevKomponen::create([
            'komponen' => 'Peningkatan kapasitas dan kapabilitas pekebun'
        ]);
        MonevKomponen::create([
            'komponen' => 'Pengelolaan dan pemantauan lingkungan'
        ]);
        MonevKomponen::create([
            'komponen' => 'Tata kelola perkebunan dan penanganan sengketa'
        ]);
        MonevKomponen::create([
            'komponen' => 'Dukungan percepatan pelaksanaan sertifikasi ISPO dan peningkatan akses pasar produk kelapa sawit'
        ]);
    }
}
