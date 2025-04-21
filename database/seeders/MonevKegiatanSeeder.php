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
        DB::table('monev_kegiatans')->delete();

        DB::table('monev_kegiatans')->insert(array (
            0 => array (
                'id' => 1,
                'id_program' => 1,
                'kegiatan' => 'Analisis data dan informasi pemerintahan daerah bidang perencanaan pembangunan daerah'
            ),
            1 => array (
                'id' => 2, 
                'id_program' => 18, 
                'kegiatan' => 'Bantuan peralatan untuk UMKM yang mengelola limbah sawit'
            ),
            2 => array (
                'id' => 3, 
                'id_program' => 21, 
                'kegiatan' => 'Fasilitasi akses lahan untuk masyarakat di area HGU '
            ),
            3 => array (
                'id' => 4, 
                'id_program' => 9, 
                'kegiatan' => 'Kerja sama pengembangan Badan Usaha Milik Desa'
            ),
            4 => array (
                'id' => 5, 
                'id_program' => 21, 
                'kegiatan' => 'Koordinasi dan Sinkronisasi Pengendalian Pemanfaatan Ruang Daerah Kabupaten/Kota'
            ),
            5 => array (
                'id' => 6, 
                'id_program' => 2, 
                'kegiatan' => 'Membangun basis data spasial dan non-spasial kelapa sawit yang berbasis teknologi'
            ),
            6 => array (
                'id' => 7, 
                'id_program' => 3, 
                'kegiatan' => 'Pelaksanaan Penyuluhan Pertanian'
            ),
            7 => array (
                'id' => 8, 
                'id_program' => 22, 
                'kegiatan' => 'Pelaksanaan TORA untuk perkebunan sawit rakyat di kawasan hutan'
            ),
            8 => array (
                'id' => 9, 
                'id_program' => 14, 
                'kegiatan' => 'Pelayanan Informasi Rawan Bencana Kabupaten/Kota di area perkebunan kelapa sawit '
            ),
            9 => array (
                'id' => 10, 
                'id_program' => 14, 
                'kegiatan' => 'Pelayanan Pencegahan dan Kesiapsiagaan Terhadap Bencana di area perkebunan kelapa sawit'
            ),
            10 => array (
                'id' => 11, 
                'id_program' => 13, 
                'kegiatan' => 'Pelestarian ekosistem gambut'
            ),
            11 => array (
                'id' => 12, 
                'id_program' => 6, 
                'kegiatan' => 'Pembangunan Prasarana Pertanian'
            ),
            12 => array (
                'id' => 13, 
                'id_program' => 1, 
                'kegiatan' => 'Pembangunan Profil Daerah'
            ),
            13 => array (
                'id' => 14, 
                'id_program' => 1, 
                'kegiatan' => 'Pembangunan profil kebun sawit rakyat dan petani kelapa sawit'
            ),
            14 => array (
                'id' => 15, 
                'id_program' => 14, 
                'kegiatan' => 'Pemberdayaan Masyarakat dalam Pencegahan Kebakaran'
            ),
            15 => array (
                'id' => 16, 
                'id_program' => 18, 
                'kegiatan' => 'Pemberdayaan Usaha Mikro yang Dilakukan Melalui Pendataan, Kemitraan, Kemudahan Perizinan, Penguatan Kelembagaan dan Koordinasi dengan Para Pemangku Kepentingan'
            ),
            16 => array (
                'id' => 17, 
                'id_program' => 18, 
                'kegiatan' => 'Pembinaan dan Pengawasan Pengelolaan Sampah yang Diselenggarakan oleh Pihak Swasta'
            ),
            17 => array (
                'id' => 18, 
                'id_program' => 17, 
                'kegiatan' => 'Pemulihan Pencemaran dan/atau Kerusakan Lingkungan Hidup Kabupaten/Kota'
            ),
            18 => array (
                'id' => 19, 
                'id_program' => 25, 
                'kegiatan' => 'Pencegahan dan penyelesaian perselisihan hubungan industrial, mogok kerja, dan penutupan perusahaan di daerah kabupaten/kota'
            ),
            19 => array (
                'id' => 20, 
                'id_program' => 15, 
                'kegiatan' => 'Pencegahan Pencemaran dan/atau Kerusakan Lingkungan Hidup Kabupaten/Kota'
            ),
            20 => array (
                'id' => 21, 
                'id_program' => 14, 
                'kegiatan' => 'Pencegahan, Pengendalian, Pemadaman, Penyelamatan, dan Penanganan Bahan Berbahaya dan Beracun Kebakaran dalam Daerah Kabupaten/Kota'
            ),
            21 => array (
                'id' => 22, 
                'id_program' => 23, 
                'kegiatan' => 'Pendampingan GTRA untuk konflik tenurial di kawasan hutan'
            ),
            22 => array (
                'id' => 23, 
                'id_program' => 26, 
                'kegiatan' => 'Pendampingan petani untuk memperoleh STDB'
            ),
            23 => array (
                'id' => 24, 
                'id_program' => 11, 
                'kegiatan' => 'Pendidikan dan Latihan Perkoperasian Bagi Koperasi yang Wilayah Keanggotaan dalam Daerah Kabupaten/Kota'
            ),
            24 => array (
                'id' => 25, 
                'id_program' => 13, 
                'kegiatan' => 'Penegakan peraturan lingkungan '
            ),
            25 => array (
                'id' => 26, 
                'id_program' => 20, 
                'kegiatan' => 'Penerbitan Izin Usaha Pertanian yang Kegiatan Usahanya Dalam Daerah Kabupaten/Kota'
            ),
            26 => array (
                'id' => 27, 
                'id_program' => 22, 
                'kegiatan' => 'Penertiban kelapa sawit di kawasan hutan'
            ),
            27 => array (
                'id' => 28, 
                'id_program' => 1, 
                'kegiatan' => 'Pengawasan Penggunaan Sarana Pertanian '
            ),
            28 => array (
                'id' => 29, 
                'id_program' => 13, 
                'kegiatan' => 'Pengelolaan Keanekaragaman Hayati Kabupaten/Kota'
            ),
            29 => array (
                'id' => 30, 
                'id_program' => 10, 
                'kegiatan' => 'Pengembangan kemitran program KUR PSR'
            ),
            30 => array (
                'id' => 31, 
                'id_program' => 25, 
                'kegiatan' => 'Pengesahan Peraturan Perusahaan dan Pendaftaran Perjanjian Kerja Bersama untuk Perusahaan yang Hanya Beroperasi dalam 1 (Satu) Daerah Kabupaten/Kota'
            ),
            31 => array (
                'id' => 32, 
                'id_program' => 11, 
                'kegiatan' => 'Penilaian Kesehatan Koperasi Simpan Pinjam/Unit Simpan Pinjam Koperasi yang Wilayah Keanggotaanya dalam 1 (Satu) Daerah Kabupaten/Kota'
            ),
            32 => array (
                'id' => 33, 
                'id_program' => 13, 
                'kegiatan' => 'Penyelenggaraan Pendidikan, Pelatihan, dan Penyuluhan Lingkungan Hidup untuk Lembaga Kemasyarakatan Tingkat Daerah Kabupaten/Kota'
            ),
            33 => array (
                'id' => 34, 
                'id_program' => 29, 
                'kegiatan' => 'Penyelenggaraan Promosi Dagang Melalui Pameran Dagang dan Misi Dagang bagi Produk Ekspor Unggulan yang Terdapat pada 1 (Satu) Daerah Kabupaten/Kota'
            ),
            34 => array (
                'id' => 35, 
                'id_program' => 1, 
                'kegiatan' => 'Penyelenggaraan Statistik Sektoral di Lingkup Daerah Kabupaten/Kota'
            ),
            35 => array (
                'id' => 36, 
                'id_program' => 26, 
                'kegiatan' => 'Penyiapan sertifikasi ISPO untuk kelembagaan pekebun sawit'
            ),
            36 => array (
                'id' => 37, 
                'id_program' => 18, 
                'kegiatan' => 'Promosi produk UMKM yang mengelola limbah sawit'
            ),
            37 => array (
                'id' => 38, 
                'id_program' => 13, 
                'kegiatan' => 'Sosialisasi Peraturan Menteri LHK tentang Pedoman Perlindungan Kawasan Ekosistem Esensial di tingkat Kabupaten'
            
            )  
        ));  
    }
}
