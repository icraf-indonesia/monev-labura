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
                'indikator' => 'Tersedianya basis data spasial dan non spasial kelapa sawit',
                'id_komponen' => 1, 
                'id_instansi' => 10,
                'target' => 1, 
                'satuan' => 'database',
                'tahun' => 2024,
                'capaian' => 1,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 1
            ),
            1 => array (
                'id' => 2, 
                'indikator' => 'Tersedianya Informasi Geospasial Tematik tutupan lahan kelapa sawit',
                'id_komponen' => 1, 
                'id_instansi' => 10,
                'target' => 1, 
                'satuan' => 'IGT',
                'tahun' => 2024,
                'capaian' => 1,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 2
            ),
            2 => array (
                'id' => 3, 
                'indikator' => 'Jumlah paket pembangunan, rehabilitasi, dan pemeliharaan jalan usaha tani',
                'id_komponen' => 1, 
                'id_instansi' => 7,
                'target' => 10, 
                'satuan' => 'paket',
                'tahun' => 2024,
                'capaian' => 5,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            3 => array (
                'id' => 4, 
                'indikator' => 'Jumlah kegiatan penyuluhan penggunaan benih bersertifikat',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 11, 
                'satuan' => 'kegiatan',
                'tahun' => 2024,
                'capaian' => 7,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            4 => array (
                'id' => 5, 
                'indikator' => 'Jumlah BPP penerima manfaat sarana dan prasarana penyuluhan pertanian',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 24, 
                'satuan' => 'BPP',
                'tahun' => 2024,
                'capaian' => 10,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            5 => array (
                'id' => 6, 
                'indikator' => 'Jumlah pelaku usaha yang dibina',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 120, 
                'satuan' => 'pelaku usaha',
                'tahun' => 2024,
                'capaian' => 50,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            6 => array (
                'id' => 7, 
                'indikator' => 'Jumlah Badan Usaha Milik Petani yang terbentuk',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 8, 
                'satuan' => 'badan usaha',
                'tahun' => 2024,
                'capaian' => 2,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            7 => array (
                'id' => 8, 
                'indikator' => 'Jumlah kegiatan penyuluhan dan kampanye lingkungan',
                'id_komponen' => 3, 
                'id_instansi' => 6,
                'target' => 10, 
                'satuan' => 'kegiatan',
                'tahun' => 2024,
                'capaian' => 3,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            8 => array (
                'id' => 9, 
                'indikator' => 'Jumlah kasus yang ditangani',
                'id_komponen' => 3, 
                'id_instansi' => 6,
                'target' => 100, 
                'satuan' => '% penyelesaian kasus',
                'tahun' => 2024,
                'capaian' => 20,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            9 => array (
                'id' => 10, 
                'indikator' => 'Luas agroforestri sawit',
                'id_komponen' => 3, 
                'id_instansi' => 6,
                'target' => 50, 
                'satuan' => 'hektar',
                'tahun' => 2024,
                'capaian' => 10,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            10 => array (
                'id' => 11, 
                'indikator' => 'Jumlah dokumen pengendalian dan pemanfaatan ruang yang sesuai',
                'id_komponen' => 4, 
                'id_instansi' => 7,
                'target' => 4, 
                'satuan' => 'dokumen',
                'tahun' => 2024,
                'capaian' => 1,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            11 => array (
                'id' => 12, 
                'indikator' => 'Persentase perusahaan yang menerapak tata kelola kerja yang layak',
                'id_komponen' => 4, 
                'id_instansi' => 4,
                'target' => 60, 
                'satuan' => 'persen perusahaan',
                'tahun' => 2024,
                'capaian' => 20,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            12 => array (
                'id' => 13, 
                'indikator' => 'Jumlah kegiatan pengembangan kapasitas terkait ISPO',

                'id_komponen' => 5, 
                'id_instansi' => 10,
                'target' => 11, 
                'satuan' => 'kegiatan',
                'tahun' => 2024,
                'capaian' => 7,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            13 => array (
                'id' => 14, 
                'indikator' => 'Jumlah lembaga pekebun yang tersertifikasi ISPO',
                'id_komponen' => 5, 
                'id_instansi' => 10,
                'target' => 10, 
                'satuan' => 'lembaga',
                'tahun' => 2024,
                'capaian' => 2,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            ),
            14 => array (
                'id' => 15, 
                'indikator' => 'Jumlah STD-B yang diterbitkan Dinas kabupaten yang dalam pemenuhan persyaratan ISPO',
                'id_komponen' => 5, 
                'id_instansi' => 10,
                'target' => 50, 
                'satuan' => 'perusahaan',
                'tahun' => 2024,
                'capaian' => 25,
                'dokumen_pendukung' => 'tidak ada',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan',
                'status' => 0
            )
        ));
    }
}