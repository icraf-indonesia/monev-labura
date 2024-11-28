<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function index(Request $request)
    // {
    //     $keluaran_table = DB::select('
    //     SELECT monev_programs.program, monev_kegiatans.kegiatan, monev_subkegiatans.subkegiatan, 
    //            monev_indikator_keluarans.indikator_keluaran, monev_indikator_keluarans.target
    //     FROM monev_indikator_keluarans
    //     LEFT JOIN monev_programs ON monev_indikator_keluarans.id_program = monev_programs.id
    //     LEFT JOIN monev_kegiatans ON monev_indikator_keluarans.id_kegiatan = monev_kegiatans.id
    //     LEFT JOIN monev_subkegiatans ON monev_indikator_keluarans.id_subkegiatan = monev_subkegiatans.id
    //     LIMIT 10
    // ');
        
    //     return view('pages.beranda', ['keluaran_tables' => $keluaran_table]);
        
    // }

    public function index(Request $request)
    {
        $keluaran_table = DB::table('monev_indikator_keluarans')
            ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->select(
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.target'
            )
            ->paginate(5); // Use pagination

        return view('pages.beranda', ['keluaran_tables' => $keluaran_table]);
    }

    public function perencanaan(Request $request)
    {
        $perencanaan_table = DB::table('monev_indikator_keluarans')
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
                'monev_instansis.instansi',
                'monev_capaians.sumber_pembiayaan'
            )
            ->paginate(5); // Use pagination
        return view('pages.perencanaan', ['perencanaan_tables' => $perencanaan_table]);
    }

    public function pembelajaran(Request $request)
    {
        return view('pages.pembelajaran');
    }

    public function pelaksanaan(Request $request)
    {
        return view('pages.beranda_pelaksanaan');
    }

    public function monitoring(Request $request)
    {
        return view('pages.beranda_monitoring');
    }

    public function dampak(Request $request)
    {
        return view('pages.beranda_dampak');
    }
}
