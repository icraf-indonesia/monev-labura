<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListIndikatorDampakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Indikator Dampak
        DB::table('list_indikator_dampaks')->delete();

        DB::table('list_indikator_dampaks')->insert(array (
            0 => array (
                'id' => 1, 
                'id_indikator' => 1, 
                'indikator' => 'Tersedianya basis data spasial dan non spasial kelapa sawit',
                'id_komponen' => 1, 
                'id_instansi' => 10,
                'target' => 1, 
                'satuan' => 'database',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            1 => array (
                'id' => 2, 
                'id_indikator' => 2, 
                'indikator' => 'Tersedianya Informasi Geospasial Tematik tutupan lahan kelapa sawit',
                'id_komponen' => 1, 
                'id_instansi' => 10,
                'target' => 1, 
                'satuan' => 'IGT',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            2 => array (
                'id' => 3, 
                'id_indikator' => 3, 
                'indikator' => 'Jumlah paket pembangunan, rehabilitasi, dan pemeliharaan jalan usaha tani',
                'id_komponen' => 1, 
                'id_instansi' => 7,
                'target' => 10, 
                'satuan' => 'paket',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            3 => array (
                'id' => 4, 
                'id_indikator' => 4, 
                'indikator' => 'Jumlah kegiatan penyuluhan penggunaan benih bersertifikat',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 11, 
                'satuan' => 'kegiatan',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            4 => array (
                'id' => 5, 
                'id_indikator' => 5, 
                'indikator' => 'Jumlah BPP penerima manfaat sarana dan prasarana penyuluhan pertanian',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 24, 
                'satuan' => 'BPP',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            5 => array (
                'id' => 6, 
                'id_indikator' => 6, 
                'indikator' => 'Jumlah pelaku usaha yang dibina',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 120, 
                'satuan' => 'pelaku usaha',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            6 => array (
                'id' => 7, 
                'id_indikator' => 7, 
                'indikator' => 'Jumlah Badan Usaha Milik Petani yang terbentuk',
                'id_komponen' => 2, 
                'id_instansi' => 10,
                'target' => 8, 
                'satuan' => 'badan usaha',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            7 => array (
                'id' => 8, 
                'id_indikator' => 8, 
                'indikator' => 'Jumlah kegiatan penyuluhan dan kampanye lingkungan',
                'id_komponen' => 3, 
                'id_instansi' => 6,
                'target' => 10, 
                'satuan' => 'kegiatan',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            8 => array (
                'id' => 9, 
                'id_indikator' => 9, 
                'indikator' => 'Jumlah kasus yang ditangani',
                'id_komponen' => 3, 
                'id_instansi' => 6,
                'target' => 100, 
                'satuan' => '% penyelesaian kasus',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            9 => array (
                'id' => 10, 
                'id_indikator' => 10, 
                'indikator' => 'Luas agroforestri sawit',
                'id_komponen' => 3, 
                'id_instansi' => 6,
                'target' => 50, 
                'satuan' => 'hektar',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            10 => array (
                'id' => 11, 
                'id_indikator' => 11, 
                'indikator' => 'Jumlah dokumen pengendalian dan pemanfaatan ruang yang sesuai',
                'id_komponen' => 4, 
                'id_instansi' => 7,
                'target' => 4, 
                'satuan' => 'dokumen',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            11 => array (
                'id' => 12, 
                'id_indikator' => 12, 
                'indikator' => 'Persentase perusahaan yang menerapak tata kelola kerja yang layak',
                'id_komponen' => 4, 
                'id_instansi' => 4,
                'target' => 60, 
                'satuan' => 'persen perusahaan',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            12 => array (
                'id' => 13, 
                'id_indikator' => 13, 
                'indikator' => 'Jumlah kegiatan pengembangan kapasitas terkait ISPO',
                'id_komponen' => 5, 
                'id_instansi' => 10,
                'target' => 11, 
                'satuan' => 'kegiatan',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            13 => array (
                'id' => 14, 
                'id_indikator' => 14, 
                'indikator' => 'Jumlah lembaga pekebun yang tersertifikasi ISPO',
                'id_komponen' => 5, 
                'id_instansi' => 10,
                'target' => 10, 
                'satuan' => 'lembaga',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            ),
            14 => array (
                'id' => 15, 
                'id_indikator' => 15, 
                'indikator' => 'Jumlah STD-B yang diterbitkan Dinas kabupaten yang dalam pemenuhan persyaratan ISPO',
                'id_komponen' => 5, 
                'id_instansi' => 10,
                'target' => 50, 
                'satuan' => 'perusahaan',
                'jenis_dokumen' => 'belum ada definisi dokumen yang dibutuhkan'
            )
        ));
    }
}
