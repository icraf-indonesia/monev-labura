<?php

namespace Database\Seeders;

use App\Models\MonevProgram;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonevProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Program
        MonevProgram::create([
            'program' => 'Program Penguatan data dasar Perkebunan Kelapa Sawit untuk dukungan tata kelola perkebunan yang lebih baik',
            'id_komponen' => 1
        ]);
        MonevProgram::create([
            'program' => 'Program Pembinaan penyelenggaraan Informasi Geospasial Tematik (IGT) tutupan kebun kelapa sawit',
            'id_komponen' => 1
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan sosialisasi regulasi dan kebijakan terkait usaha perkebunan kelapa sawit berkelanjutan bagi pekebun dan pemangku kepentingan lainnya',
            'id_komponen' => 1
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan Sinergitas antar kementerian/lembaga pemerintah daerah dalam hubungannya dengan usaha perkebunan kelapa sawit',
            'id_komponen' => 1
        ]);
        MonevProgram::create([
            'program' => 'Program Pembentukan Tim Pelaksana Daerah dalam bentuk forum multi pihak kelapa sawit berkelanjutan di tingkat provinsi dan kabupaten/kota penghasil kelapa sawit',
            'id_komponen' => 1
        ]);
        MonevProgram::create([
            'program' => 'Program Pembangunan dan peningkatan jalan untuk mendukung peningkatan kualitas usaha perkebunan kelapa sawit',
            'id_komponen' => 1
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan kepatuhan hukum bagi pelaku usaha dalam usaha perkebunan kelapa sawit secara koordinatif',
            'id_komponen' => 1
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan kapasitas dan kapabilitas pekebun dalam penggunaan benih bersertifikat',
            'id_komponen' => 2
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan kapasitas dan kapabilitas pekebun dalam menerapkan praktik budidaya yang baik',
            'id_komponen' => 2
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan akses pendanaan peremajaan tanaman bagi pekebun',
            'id_komponen' => 2
        ]);
        MonevProgram::create([
            'program' => 'Program Percepatan Pembentukan dan penguatan kelembagaan pekebun',
            'id_komponen' => 2
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan penyuluhan pertanian di kawasan sentra produksi kelapa sawit',
            'id_komponen' => 2
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan Upaya Konservasi Keanekaragaman hayati dan lanskap perkebunan',
            'id_komponen' => 3
        ]);
        MonevProgram::create([
            'program' => 'Program Pelaksanaan Pencegahan Kebakaran Kebun dan Lahan',
            'id_komponen' => 3
        ]);
        MonevProgram::create([
            'program' => 'Program Penurunan Emisi Gas Rumah Kaca (GRK) secara lintas sektor di kebun dan lahan',
            'id_komponen' => 3
        ]);
        MonevProgram::create([
            'program' => 'Pengukuran Pelaporan dan Verifikasi (measurement, reporting, and verification/MRV) potensi penurunan emisi GRK diperkebunan kelapa sawit',
            'id_komponen' => 3
        ]);
        MonevProgram::create([
            'program' => 'Peningkatan pemanfaatan lahan kritis sebagai upaya penurunan emisi GRK dalam perkebunan kelapa sawit',
            'id_komponen' => 3
        ]);
        MonevProgram::create([
            'program' => 'Pemanfaatan Limbah Kelapa Sawit untuk peningkatan rantai nilai ekonomi',
            'id_komponen' => 3
        ]);
        MonevProgram::create([
            'program' => 'Program Peningkatan Pemanfaatan Produk Kelapa Sawit Sebagai Energi Terbarukan Dalam Rangka Ketahanan Energi',
            'id_komponen' => 3
        ]);
        MonevProgram::create([
            'program' => 'Program Percepatan realisasi kewajiban perusahaan dalam memfasilitasi pembangunan kebun kelapa sawit berkelanjutan bagi masyarakat',
            'id_komponen' => 4
        ]);
        MonevProgram::create([
            'program' => 'Program Melakukan Penanganan Sengketa Lahan Perkebunan Kelapa Sawit di Kawasan Area Penggunaan Lain',
            'id_komponen' => 4
        ]);
        MonevProgram::create([
            'program' => 'Program Penyelesaian status lahan usaha perkebunan kelapa sawit yang terindikasi dalam kawasan hutan',
            'id_komponen' => 4
        ]);
        MonevProgram::create([
            'program' => 'Program Legalitas lahan hasil penyelesaian status perkebunan yang terindikasi dalam kawasan hutan dan penyelesaian sengketa lahan',
            'id_komponen' => 4
        ]);
        MonevProgram::create([
            'program' => 'Program Penyelesaian status lahan usaha perkebunan yang terindikasi di ekosistem gambut',
            'id_komponen' => 4
        ]);
        MonevProgram::create([
            'program' => 'Program Pelaksanaan Review regulasi ketenagakerjaan dan diseminasi terkait pengawsan atas pelaksanaan sistem Keselamatan dan Kesehatan Kerja (K3) dan Jaminan Sosial Tenaga Kerja dalam usaha perkebunan kelapa sawit',
            'id_komponen' => 4
        ]);
        MonevProgram::create([
            'program' => 'Program Percepatan Pelaksanaan Sertifikasi ISPO untuk perusahaan dan pekebun',
            'id_komponen' => 5
        ]);
        MonevProgram::create([
            'program' => 'Program Pelaksanaan Sosialisasi ISPO untuk pemangku kepentingan nasional',
            'id_komponen' => 5
        ]);
        MonevProgram::create([
            'program' => 'Program Penyelenggaraan diplomasi, promosi dan advokasi menuju keberterimaan ISPO oleh pasar internasional',
            'id_komponen' => 5
        ]);
        MonevProgram::create([
            'program' => 'Program Penyebarluasan Informasi Kegiatan Pembangunan Kelapa Sawit Berkelanjutan (RAD KSB Sumatera Utara)',
            'id_komponen' => 5
        ]);
        
    }
}
