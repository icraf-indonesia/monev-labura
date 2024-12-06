<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontributorController extends Controller
{
    //
    public function index(Request $request)
    {
        $cari = $request->kata;

        $indikator_dampak = DB::table('monev_indikators')
        ->select(
            'monev_indikators.indikator',
            'monev_indikators.target',
            'monev_indikators.satuan',
            'monev_indikators.tahun',
            'monev_indikators.capaian',
            'monev_indikators.dokumen_pendukung',
            'monev_indikators.keterangan'
        )
        ->paginate(5); // Use pagination
        return view('kontributor.index', ['indikator_dampaks' => $indikator_dampak]);
    }

    public function kegiatan(Request $request)
    {
        $kegiatan_tables = DB::table('monev_indikator_keluarans')
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
        return view('kontributor.daftar_kegiatan', ['kegiatan_tables' => $kegiatan_tables]);
    }

    public function inputIndikator(Request $request)
    {
        return view('kontributor.input_indikator');
    }

    public function inputKegiatan(Request $request)
    {
        return view('kontributor.input_pelaksanaan_kegiatan');
    }
}
