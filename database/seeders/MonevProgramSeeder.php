<?php

namespace Database\Seeders;

use App\Models\MonevProgram;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('programs')->delete();

        DB::table('programs')->insert(array (
            0 => array ('id' => 1, 'program' => 'Penguatan data dasar Perkebunan Kelapa Sawit untuk dukungan tata kelola perkebunan yang lebih baik', 'id_komponen' => 1),
            1 => array ('id' => 2, 'program' => 'Pembinaan penyelenggaraan Informasi Geospasial Tematik (IGT) tutupan kebun kelapa sawit', 'id_komponen' => 1),
            2 => array ('id' => 3, 'program' => 'Peningkatan sosialisasi regulasi dan kebijakan terkait usaha perkebunan kelapa sawit berkelanjutan bagi pekebun dan pemangku kepentingan lainnya', 'id_komponen' => 1),
            3 => array ('id' => 4, 'program' => 'Peningkatan Sinergitas antar kementerian/lembaga pemerintah daerah dalam hubungannya dengan usaha perkebunan kelapa sawit', 'id_komponen' => 1),
            4 => array ('id' => 5, 'program' => 'Pembentukan Tim Pelaksana Daerah dalam bentuk forum multi pihak kelapa sawit berkelanjutan di tingkat provinsi dan kabupaten/kota penghasil kelapa sawit', 'id_komponen' => 1),
            5 => array ('id' => 6, 'program' => 'Pembangunan dan peningkatan jalan untuk mendukung peningkatan kualitas usaha perkebunan kelapa sawit', 'id_komponen' => 1),
            6 => array ('id' => 7, 'program' => 'Peningkatan kepatuhan hukum bagi pelaku usaha dalam usaha perkebunan kelapa sawit secara koordinatif', 'id_komponen' => 1),
            7 => array ('id' => 8, 'program' => 'Peningkatan kapasitas dan kapabilitas pekebun dalam penggunaan benih bersertifikat', 'id_komponen' => 2),
            8 => array ('id' => 9, 'program' => 'Peningkatan kapasitas dan kapabilitas pekebun dalam menerapkan praktik budidaya yang baik', 'id_komponen' => 2),
            9 => array ('id' => 10, 'program' => 'Peningkatan akses pendanaan peremajaan tanaman bagi pekebun', 'id_komponen' => 2),
            10 => array ('id' => 11, 'program' => 'Percepatan Pembentukan dan penguatan kelembagaan pekebun', 'id_komponen' => 2),
            11 => array ('id' => 12, 'program' => 'Peningkatan penyuluhan pertanian di kawasan sentra produksi kelapa sawit', 'id_komponen' => 2),
            12 => array ('id' => 13, 'program' => 'Peningkatan Upaya Konservasi Keanekaragaman hayati dan lanskap perkebunan', 'id_komponen' => 3),
            13 => array ('id' => 14, 'program' => 'Pelaksanaan Pencegahan Kebakaran Kebun dan Lahan', 'id_komponen' => 3),
            14 => array ('id' => 15, 'program' => 'Penurunan Emisi Gas Rumah Kaca (GRK) secara lintas sektor di kebun dan lahan', 'id_komponen' => 3),
            15 => array ('id' => 16, 'program' => 'Pengukuran Pelaporan dan Verifikasi (measurement, reporting, and verification/MRV) potensi penurunan emisi GRK diperkebunan kelapa sawit', 'id_komponen' => 3),
            16 => array ('id' => 17, 'program' => 'Peningkatan pemanfaatan lahan kritis sebagai upaya penurunan emisi GRK dalam perkebunan kelapa sawit', 'id_komponen' => 3),
            17 => array ('id' => 18, 'program' => 'Pemanfaatan Limbah Kelapa Sawit untuk peningkatan rantai nilai ekonomi', 'id_komponen' => 3),
            18 => array ('id' => 19, 'program' => 'Peningkatan Pemanfaatan Produk Kelapa Sawit Sebagai Energi Terbarukan Dalam Rangka Ketahanan Energi', 'id_komponen' => 3),
            19 => array ('id' => 20, 'program' => 'Percepatan realisasi kewajiban perusahaan dalam memfasilitasi pembangunan kebun kelapa sawit berkelanjutan bagi masyarakat', 'id_komponen' => 4),
            20 => array ('id' => 21, 'program' => 'Melakukan Penanganan Sengketa Lahan Perkebunan Kelapa Sawit di Kawasan Area Penggunaan Lain', 'id_komponen' => 4),
            21 => array ('id' => 22, 'program' => 'Penyelesaian status lahan usaha perkebunan kelapa sawit yang terindikasi dalam kawasan hutan', 'id_komponen' => 4),
            22 => array ('id' => 23, 'program' => 'Legalitas lahan hasil penyelesaian status perkebunan yang terindikasi dalam kawasan hutan dan penyelesaian sengketa lahan', 'id_komponen' => 4),
            23 => array ('id' => 24, 'program' => 'Penyelesaian status lahan usaha perkebunan yang terindikasi di ekosistem gambut', 'id_komponen' => 4),
            24 => array ('id' => 25, 'program' => 'Pelaksanaan Review regulasi ketenagakerjaan dan diseminasi terkait pengawsan atas pelaksanaan sistem Keselamatan dan Kesehatan Kerja (K3) dan Jaminan Sosial Tenaga Kerja dalam usaha perkebunan kelapa sawit', 'id_komponen' => 4),
            25 => array ('id' => 26, 'program' => 'Percepatan Pelaksanaan Sertifikasi ISPO untuk perusahaan dan pekebun', 'id_komponen' => 5),
            26 => array ('id' => 27, 'program' => 'Pelaksanaan Sosialisasi ISPO untuk pemangku kepentingan nasional', 'id_komponen' => 5),
            27 => array ('id' => 28, 'program' => 'Penyelenggaraan diplomasi, promosi dan advokasi menuju keberterimaan ISPO oleh pasar internasional', 'id_komponen' => 5),
            28 => array ('id' => 29, 'program' => 'Penyebarluasan Informasi Kegiatan Pembangunan Kelapa Sawit Berkelanjutan (RAD KSB Sumatera Utara)', 'id_komponen' => 5)
        ));        
    }
}
