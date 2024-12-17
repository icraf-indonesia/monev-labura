<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $indikator_dampak = DB::table('monev_indikators')
        ->select(
            'id',
            'indikator',
            'target',
            'satuan',
            'dokumen_pendukung'
        )
        ->paginate(5); // Use pagination

        return view('admin.index', ['indikator_dampaks' => $indikator_dampak]);
    }

    public function editIndikator(Request $request)
    {
        return view('admin.edit_indikator');
    }

    public function updateIndikator(Request $request)
    {
        
    }

    public function verifikasiIndikator(Request $request)
    {
        return view('admin.verifikasi_indikator');
    }

    public function approveIndikator(Request $request)
    {

    }

    public function rejectIndikator(Request $request)
    {

    }

    public function daftarKegiatan(Request $request)
    {
        $kegiatans = DB::table('monev_indikator_keluarans')
            ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->leftJoin('monev_instansis', 'monev_indikator_keluarans.id_instansi', '=', 'monev_instansis.id')
            ->leftJoin('monev_capaians', 'monev_indikator_keluarans.id', '=', 'monev_capaians.id_keluaran')
            ->select(
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.target',
                'monev_instansis.instansi',
                'monev_capaians.sumber_pembiayaan',
                'monev_capaians.status',
            )
            ->paginate(5); // Use pagination
        return view('admin.manajemen_kegiatan', ['kegiatans' => $kegiatans]);
    }

    public function editKegiatan(Request $request)
    {
        return view('admin.edit_kegiatan');
    }

    public function verifikasiKegiatan(Request $request)
    {
        return view('admin.verifikasi_kegiatan');
    }

    public function updateKegiatan(Request $request)
    {
        
    }

    public function approveKegiatan(Request $request)
    {

    }

    public function rejectKegiatan(Request $request)
    {

    }

    public function tambahKegiatan(Request $request)
    {
        return view('admin.tambah_kegiatan');
    }
}
