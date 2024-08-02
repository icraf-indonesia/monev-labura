<?php

namespace Database\Seeders;

use App\Models\MonevKegiatan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonevKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Kegiatan
        DB::table('kegiatans')->delete();

        DB::table('kegiatans')->insert(array (
            0 => array (
                'id' => 1, 
                'kegiatan' => 'Penyelenggaraan Statistik Sektoral di Lingkup Daerah Kabupaten/Kota'
            ),
            1 => array (
                'id' => 2, 
                'kegiatan' => 'Analisis data dan informasi pemerintahan daerah bidang perencanaan pembangunan daerah'
            ),
            2 => array (
                'id' => 3, 
                'kegiatan' => 'Pembangunan Profil Daerah'
            ),
            3 => array (
                'id' => 4, 
                'kegiatan' => 'Pembangunan profil kebun sawit rakyat dan petani kelapa sawit'
            ),
            4 => array (
                'id' => 5, 
                'kegiatan' => 'Membangun basis data spasial dan non-spasial kelapa sawit yang berbasis teknologi'
            ),
            5 => array (
                'id' => 6, 
                'kegiatan' => 'Pelaksanaan Penyuluhan Pertanian'
            ),
            6 => array (
                'id' => 7, 
                'kegiatan' => 'Koordinasi dan Sinkronisasi Pengendalian Pemanfaatan Ruang Daerah Kabupaten/Kota'
            ),
            7 => array (
                'id' => 8, 
                'kegiatan' => 'Penyelenggaraan Jalan Kabupaten/Kota'
            ),
            8 => array (
                'id' => 9, 
                'kegiatan' => 'Pembangunan Prasarana Pertanian'
            ),
            9 => array (
                'id' => 10, 
                'kegiatan' => 'Pengawasan Penggunaan Sarana Pertanian '
            ),
            10 => array (
                'id' => 11, 
                'kegiatan' => 'Pengesahan Peraturan Perusahaan dan Pendaftaran Perjanjian Kerja Bersama untuk Perusahaan yang Hanya Beroperasi dalam 1 (Satu) Daerah Kabupaten/Kota'
            ),
            11 => array (
                'id' => 12, 
                'kegiatan' => 'Penerbitan Izin Usaha Pertanian yang Kegiatan Usahanya Dalam Daerah Kabupaten/Kota'
            ),
            12 => array (
                'id' => 13, 
                'kegiatan' => 'Kerja sama dengan lembaga penelitian dan perguruan tinggi untuk kajian pengelolaan kelapa sawit berkelanjutan.'
            ),
            13 => array (
                'id' => 14, 
                'kegiatan' => 'Kemitraan dan kerja sama dengan lembaga perbankan (Bank Sumut, Bank BRI) dalam realiasi KUR PSR di labura.'
            ),
            14 => array (
                'id' => 15, 
                'kegiatan' => 'Koordinasi Perencanaan Bidang Perekonomian dan SDA (Sumber Daya Alam)'
            ),
            15 => array (
                'id' => 16, 
                'kegiatan' => 'Pendidikan dan Latihan Perkoperasian Bagi Koperasi yang Wilayah Keanggotaan dalam Daerah Kabupaten/Kota'
            ),
            16 => array (
                'id' => 17, 
                'kegiatan' => 'Penilaian Kesehatan Koperasi Simpan Pinjam/Unit Simpan Pinjam Koperasi yang Wilayah Keanggotaanya dalam 1 (Satu) Daerah Kabupaten/Kota'
            ),
            17 => array (
                'id' => 18, 
                'kegiatan' => 'Penyelenggaraan Pendidikan, Pelatihan, dan Penyuluhan Lingkungan Hidup untuk Lembaga Kemasyarakatan Tingkat Daerah Kabupaten/Kota'
            ),
            18 => array (
                'id' => 19, 
                'kegiatan' => 'Pengelolaan Keanekaragaman Hayati Kabupaten/Kota'
            ),
            19 => array (
                'id' => 20, 
                'kegiatan' => 'Pemulihan Pencemaran dan/atau Kerusakan Lingkungan Hidup Kabupaten/Kota'
            ),
            20 => array (
                'id' => 21, 
                'kegiatan' => 'Pembinaan dan Pengawasan Terhadap Usaha dan/atau Kegiatan yang Izin Lingkungan dan Izin PPLH Diterbitkan oleh Pemerintah Daerah Kabupaten/Kota'
            ),
            21 => array (
                'id' => 22, 
                'kegiatan' => 'Pemantauan tinggi muka air di areal gambut dengan tutupan lahan kelapa sawit'
            ),
            22 => array (
                'id' => 23, 
                'kegiatan' => 'Rehabilitasi area sempadan sungai '
            ),
            23 => array (
                'id' => 24, 
                'kegiatan' => 'Sosialisasi Peraturan Menteri LHK tentang Pedoman Perlindungan Kawasan Ekosistem Esensial di tingkat Kabupaten'
            ),
            24 => array (
                'id' => 25, 
                'kegiatan' => 'Pencegahan, Pengendalian, Pemadaman, Penyelamatan, dan Penanganan Bahan Berbahaya dan Beracun Kebakaran dalam Daerah Kabupaten/Kota'
            ),
            25 => array (
                'id' => 26, 
                'kegiatan' => 'Penyusunan regulasi penanggulangan bencana'
            ),
            26 => array (
                'id' => 27, 
                'kegiatan' => 'Pelayanan Pencegahan dan Kesiapsiagaan Terhadap Bencana'
            ),
            27 => array (
                'id' => 28, 
                'kegiatan' => 'Pelayanan Penyelamatan dan Evakuasi Korban Bencana'
            ),
            28 => array (
                'id' => 29, 
                'kegiatan' => 'Pelayanan Informasi Rawan Bencana Kabupaten/Kota di area perkebunan kelapa sawit '
            ),
            29 => array (
                'id' => 30, 
                'kegiatan' => 'Pemberdayaan Masyarakat dalam Pencegahan Kebakaran'
            ),
            30 => array (
                'id' => 31, 
                'kegiatan' => 'Pencegahan Pencemaran dan/atau Kerusakan Lingkungan Hidup Kabupaten/Kota'
            ),
            31 => array (
                'id' => 32, 
                'kegiatan' => 'Pembinaan dan Pengawasan Pengelolaan Sampah yang Diselenggarakan oleh Pihak Swasta'
            ),
            32 => array (
                'id' => 33, 
                'kegiatan' => 'Pemberdayaan Usaha Mikro yang Dilakukan Melalui Pendataan, Kemitraan, Kemudahan Perizinan, Penguatan Kelembagaan
                dan Koordinasi dengan Para Pemangku Kepentingan'
            ),
            33 => array (
                'id' => 34, 
                'kegiatan' => 'Penyimpanan Sementara Limbah B3'
            ),
            34 => array (
                'id' => 35, 
                'kegiatan' => 'Bantuan peralatan untuk UMKM yang mengelola limbah sawit'
            ),
            35 => array (
                'id' => 36, 
                'kegiatan' => 'Promosi produk UMKM yang mengelola limbah sawit'
            ),
            36 => array (
                'id' => 37, 
                'kegiatan' => 'Koordinasi dan Sinkronisasi Pemanfaatan Ruang Daerah Kabupaten/Kota'
            ),
            37 => array (
                'id' => 38, 
                'kegiatan' => 'Pembentukan tim penyeelsaian sengketa'
            ),
            38 => array (
                'id' => 39, 
                'kegiatan' => 'Fasilitasi akses lahan untuk masyarakat di area HGU seluas 20%'
            ),
            39 => array (
                'id' => 40, 
                'kegiatan' => 'Penetapan Rencana Tata Ruang Wilayah (RTRW) dan Rencana Rinci Tata Ruang (RRTR) Kabupaten/Kota'
            ),
            40 => array (
                'id' => 41, 
                'kegiatan' => 'Pelayanan Perizinan dan Non Perizinan Secara Terpadu Satu Pintu dibidang Penanaman Modal yang Menjadi Kewenangan Daerah Kabupaten/ Kota'
            ),
            41 => array (
                'id' => 42, 
                'kegiatan' => 'Penertiban kelapa sawit di kawasan hutan '
            ),
            42 => array (
                'id' => 43, 
                'kegiatan' => 'Pelaksanaan TORA untuk perkebunan sawit rakyat di kawasan hutan  '
            ),
            43 => array (
                'id' => 44, 
                'kegiatan' => 'Pendampingan GTRA untuk konflik tenurial di kawasan hutan'
            ),
            44 => array (
                'id' => 45, 
                'kegiatan' => 'Pencegahan dan penyelesaian perselisihan hubungan industrial, mogok kerja, dan penutupan perusahaan di daerah kabupaten/kota'
            ),
            45 => array (
                'id' => 46, 
                'kegiatan' => 'Pelaksanaan pelatihan berdasarkan unit kompetensi'
            ),
            46 => array (
                'id' => 47, 
                'kegiatan' => 'Pendampingan petani untuk memperoleh STDB'
            ),
            47 => array (
                'id' => 48, 
                'kegiatan' => 'Mencetak dan memperbanyak petugas PUP (penilai usaha perkebunan) di Labura'
            ),
            48 => array (
                'id' => 49, 
                'kegiatan' => 'Penyelenggaraan Promosi Dagang Melalui Pameran Dagang dan Misi Dagang bagi Produk Ekspor Unggulan yang Terdapat pada 1 (Satu) Daerah Kabupaten/Kota'
            )  
        ));  
    }
}
