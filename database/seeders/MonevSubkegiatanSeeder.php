<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonevSubkegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Subkegiatan
        DB::table('monev_subkegiatans')->delete();

        DB::table('monev_subkegiatans')->insert(array (
            0 => array (
                'id' => 1, 
                'id_kegiatan' => 35, 
                'subkegiatan' =>'Koordinasi dan Sinkronisasi Pengumpulan, Pengolahan, Analisis dan Diseminasi Data Statistik Sektoral'
            ),
            1 => array (
                'id' => 2, 
                'id_kegiatan' => 1, 
                'subkegiatan' =>'Pembinaan dan pemanfaatan data dan informasi perencanaan pembangunan perangkat daerah'
            ),
            2 => array (
                'id' => 3, 
                'id_kegiatan' => 1, 
                'subkegiatan' =>'Penyusunan Profil Pembangunan Daerah Kabupaten/Kota'
            ),
            3 => array (
                'id' => 4, 
                'id_kegiatan' => 13, 
                'subkegiatan' =>'Penyusunan profil kebun sawit rakyat dan petani kelapa sawit'
            ),
            4 => array (
                'id' => 5, 
                'id_kegiatan' => 6, 
                'subkegiatan' =>'Penyusunan basis data spasial dan non spasial kelapa sawit'
            ),
            5 => array (
                'id' => 6, 
                'id_kegiatan' => 6, 
                'subkegiatan' =>'Penyediaan Informasi Geospasial Tematik tutupan lahan kelapa sawit yang mutakhir'
            ),
            6 => array (
                'id' => 7, 
                'id_kegiatan' => 6, 
                'subkegiatan' =>'Peningkatan kapasitas SDM untuk penyelenggaraan Informasi Geopspasial Tematik kelapa sawit'
            ),
            7 => array (
                'id' => 8, 
                'id_kegiatan' => 7, 
                'subkegiatan' =>'Sosialisasi kebijakan usaha perkebunan kelapa sawit'
            ),
            8 => array (
                'id' => 9, 
                'id_kegiatan' => 5, 
                'subkegiatan' =>'Koordinasi Pelaksanaan Penataan Ruang'
            ),
            9 => array (
                'id' => 10, 
                'id_kegiatan' => 12, 
                'subkegiatan' =>'Pembangunan, rehabilitasi, dan pemeliharaan Jalan Usaha Tani'
            ),
            10 => array (
                'id' => 11, 
                'id_kegiatan' => 28, 
                'subkegiatan' =>'Pengawasan Penggunaan Sarana Pendukung Pertanian Sesuai dengan Komoditas, Teknologi dan Spesifik Lokasi '
            ),
            11 => array (
                'id' => 12, 
                'id_kegiatan' => 31, 
                'subkegiatan' =>'Penyelenggaraan Pendataan Sarana Hubungan Industrial dan Jaminan Sosial Tenaga Kerja serta Pengupahan'
            ),
            12 => array (
                'id' => 13, 
                'id_kegiatan' => 7, 
                'subkegiatan' =>'Pengembangan kapasitas dalam penggunaan benih bersertifikat'
            ),
            13 => array (
                'id' => 14, 
                'id_kegiatan' => 28, 
                'subkegiatan' =>'Pengawasan penggunaan benih bersertifikat'
            ),
            14 => array (
                'id' => 15, 
                'id_kegiatan' => 7, 
                'subkegiatan' =>'Penyediaan dan Pemanfaatan Sarana dan Prasarana Penyuluhan Pertanian'
            ),
            15 => array (
                'id' => 16, 
                'id_kegiatan' => 7, 
                'subkegiatan' =>'Peningkatan Kapasitas Kelembagaan Penyuluhan Pertanian di Kecamatan dan Desa '
            ),
            16 => array (
                'id' => 17, 
                'id_kegiatan' => 4, 
                'subkegiatan' =>'Penelitian dan Pengembangan Badan Usaha Milik Daerah'
            ),
            17 => array (
                'id' => 18, 
                'id_kegiatan' => 30, 
                'subkegiatan' =>'Kemitraan dan kerja sama dengan lembaga perbankan dalam realiasi KUR PSR'
            ),
            18 => array (
                'id' => 19, 
                'id_kegiatan' => 7, 
                'subkegiatan' =>'Penyiapan kelembagaan petani untuk mengakses program PSR'
            ),
            19 => array (
                'id' => 20, 
                'id_kegiatan' => 7, 
                'subkegiatan' =>'Pengembangan Kapasitas Kelembagaan Petani di Kecamatan dan Desa'
            ),
            20 => array (
                'id' => 21, 
                'id_kegiatan' => 7, 
                'subkegiatan' =>'Pembentukan Badan Usaha Milik Petani'
            ),
            21 => array (
                'id' => 22, 
                'id_kegiatan' => 24, 
                'subkegiatan' =>'Peningkatan Pemahaman dan Pengetahuan Perkoperasian serta Kapasitas dan Kompetensi SDM Koperasi  '
            ),
            22 => array (
                'id' => 23, 
                'id_kegiatan' => 32, 
                'subkegiatan' =>'Pelaksanaan Penilaian Kesehatan KSP/USP Koperasi Kewenangan Kabupaten/Kota'
            ),
            23 => array (
                'id' => 24, 
                'id_kegiatan' => 33, 
                'subkegiatan' =>'Penyelenggaraan Penyuluhan dan Kampanye Lingkungan Hidup untuk pengelolaan kelapa sawit berkelanjutan'
            ),
            24 => array (
                'id' => 25, 
                'id_kegiatan' => 29, 
                'subkegiatan' =>'Peningkatan keanekaragaman hayati perkebunan kelapa sawit'
            ),
            25 => array (
                'id' => 26, 
                'id_kegiatan' => 11, 
                'subkegiatan' =>'Pemantauan tinggi muka air di areal gambut dengan tutupan lahan kelapa sawit'
            ),
            26 => array (
                'id' => 27, 
                'id_kegiatan' => 25, 
                'subkegiatan' =>'Penerapan sanksi untuk pengusaha kelapa sawit yang tidak memiliki RKL UPL'
            ),
            27 => array (
                'id' => 28, 
                'id_kegiatan' => 38, 
                'subkegiatan' =>'Sosialisasi Peraturan Menteri LHK tentang Pedoman Perlindungan Kawasan Ekosistem Esensial di tingkat Kabupaten'
            ),
            28 => array (
                'id' => 29, 
                'id_kegiatan' => 21, 
                'subkegiatan' =>'Pengadaan Sarana dan Prasarana Pencegahan, Penanggulangan Kebakaran dan Alat Pelindung Diri'
            ),
            29 => array (
                'id' => 30, 
                'id_kegiatan' => 10, 
                'subkegiatan' =>'Penyusunan rencana penanggulangan bencana kebakaran hutan dan lahan '
            ),
            30 => array (
                'id' => 31, 
                'id_kegiatan' => 10, 
                'subkegiatan' =>'Pengembangan kapasitas TRC (Tim Reaksi Cepat) bencana'
            ),
            31 => array (
                'id' => 32, 
                'id_kegiatan' => 9, 
                'subkegiatan' =>'Sosialisasi, informasi, dan edukasi rawan bencana'
            ),
            32 => array (
                'id' => 33, 
                'id_kegiatan' => 10, 
                'subkegiatan' =>'Pelatihan pencegahan dan mitigasi bencana'
            ),
            33 => array (
                'id' => 34, 
                'id_kegiatan' => 9, 
                'subkegiatan' =>'Penyusunan Kajian Risiko Bencana Kebakaran'
            ),
            34 => array (
                'id' => 35, 
                'id_kegiatan' => 15, 
                'subkegiatan' =>'Pembentukan dan Pembinaan Relawan Pemadam Kebakaran'
            ),
            35 => array (
                'id' => 36, 
                'id_kegiatan' => 18, 
                'subkegiatan' =>'Pelaksanaan pemantauan kebakaran lahan di area perusahaan'
            ),
            36 => array (
                'id' => 37, 
                'id_kegiatan' => 20, 
                'subkegiatan' =>'Pelaksanaan inventarisasi GRK '
            ),
            37 => array (
                'id' => 38, 
                'id_kegiatan' => 20, 
                'subkegiatan' =>'Penyusunan profil emisi GRK'
            
            ),
			38 => array (
				'id' => 39, 
				'id_kegiatan' => 20, 
                'subkegiatan' =>'Pelaporan pelaksanaan aksi mitigasi pada perkebunan sawit'
			),
			39 => array (
				'id' => 40, 
				'id_kegiatan' => 18, 
                'subkegiatan' =>'Rehabilitasi lahan kritis melalui skema agroforestri sawit'
			),
			40 => array (
				'id' => 41, 
				'id_kegiatan' => 17, 
                'subkegiatan' =>'Monitoring dan Evaluasi Pemenuhan Target dan Standar Pelayanan Pengelolaan Sampah untuk pabrik dan pengelola usaha kelapa sawit'
			),
			41 => array (
				'id' => 42, 
				'id_kegiatan' => 16, 
                'subkegiatan' =>'Pengembangan Usaha Mikro untuk pengelolaan limbah kelapa sawit'
			),
			42 => array (
				'id' => 43, 
				'id_kegiatan' => 2, 
                'subkegiatan' =>'Bantuan peralatan untuk UMKM yang mengelola limbah sawit'
			),
			43 => array (
				'id' => 44, 
				'id_kegiatan' => 37, 
                'subkegiatan' =>'Promosi produk UMKM yang mengelola limbah sawit'
			),
			44 => array (
				'id' => 45, 
				'id_kegiatan' => 26, 
                'subkegiatan' =>'Pembinaan dan Pengawasan Penerapan Izin Usaha Pertanian'
			),
			45 => array (
				'id' => 46, 
				'id_kegiatan' => 5, 
                'subkegiatan' =>'Koordinasi dan Sinkronisasi Pengendalian Pemanfaatan Ruang Daerah Kabupaten/Kota'
			),
			46 => array (
				'id' => 47, 
				'id_kegiatan' => 3, 
                'subkegiatan' =>'Fasilitasi akses lahan untuk masyarakat di area HGU seluas 20%'
			),
			47 => array (
				'id' => 48, 
				'id_kegiatan' => 27, 
                'subkegiatan' =>'Membentuk skema perhutanan sosial'
			),
			48 => array (
				'id' => 49, 
				'id_kegiatan' => 27, 
                'subkegiatan' =>'Penegakan perlakuan untuk kelapa sawit yang sudah ada dengan skema 1 daur tanam'
			),
			49 => array (
				'id' => 50, 
				'id_kegiatan' => 8, 
                'subkegiatan' =>'Pendampingan pekebun sawit untuk mengajukan program TORA'
			),
			50 => array (
				'id' => 51, 
				'id_kegiatan' => 22, 
                'subkegiatan' =>'Pendampingan GTRA untuk konflik tenurial di kawasan hutan'
			),
			51 => array (
				'id' => 52, 
				'id_kegiatan' => 31, 
                'subkegiatan' =>'Pengesahan peraturan perusahaan dan pendaftaran perjanjian kerja bersama untuk perusahaan yang hanya beroperasi dalam 1 daerah kabupaten/kota'
			),
			52 => array (
				'id' => 53, 
				'id_kegiatan' => 19, 
                'subkegiatan' =>'Pencegahan dan penyelesaian perselisihan hubungan industrial, mogok kerja, dan penutupan perusahaan di daerah kabupaten/kota'
			),
			53 => array (
				'id' => 54, 
				'id_kegiatan' => 7, 
                'subkegiatan' =>'Pelaksanaan sosialisasi ISPO untuk pekebun sawit'
			),
			54 => array (
				'id' => 55, 
				'id_kegiatan' => 7, 
                'subkegiatan' =>'Pengembangan Kapasitas Kelembagaan Petani di Kecamatan dan Desa untuk Sertifkasi ISPO'
			),
			55 => array (
				'id' => 56, 
				'id_kegiatan' => 23, 
                'subkegiatan' =>'Pendampingan petani untuk memperoleh STDB'
			),
			56 => array (
				'id' => 57, 
				'id_kegiatan' => 36, 
                'subkegiatan' =>'Pendampingan penyiapan sertifikasi ISPO untuk kelembagaan pekebun sawit'
			),
			57 => array (
				'id' => 58, 
				'id_kegiatan' => 7, 
                'subkegiatan' =>'Peningkatan kapasitas kelembagaan penyuluhan pertanian di kecamatan dan desa untuk mendukung pelaksanaan ISPO'
			),
			58 => array (
				'id' => 59, 
				'id_kegiatan' => 34, 
                'subkegiatan' =>'Fasilitasi Partisipasi dalam Pameran Dagang Nasional'
			)
        ));  
    }
}
