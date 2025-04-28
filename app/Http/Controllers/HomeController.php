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
        // Get the selected year from request
        $tahun = $request->input('tahun');

        // Fetch unique years for the dropdown
        $tahun_list = DB::table('monev_capaians')
            ->select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        $keluaran_table = DB::table('monev_indikator_keluarans')
            ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->leftJoin('monev_capaians', 'monev_indikator_keluarans.id', '=', 'monev_capaians.id_keluaran')
            ->select(
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.target',
                'monev_capaians.capaian',
                'monev_capaians.tahun'
            );
            // ->paginate(5); // Use pagination

        // Apply year filter if a year is selected
        if ($tahun) {
            $keluaran_table->where('monev_capaians.tahun', $tahun);
        }

        $keluaran_table = $keluaran_table->paginate(5);

        // Step 1: Get each indicator's percentage
        $indikators = DB::table('monev_indikators')
            ->leftJoin('monev_komponens', 'monev_indikators.id_komponen', '=', 'monev_komponens.id')
            ->select(
                'monev_komponens.komponen',
                DB::raw('monev_indikators.capaian'),
                DB::raw('monev_indikators.target'),
                DB::raw('CASE WHEN monev_indikators.target > 0 THEN (monev_indikators.capaian / monev_indikators.target) * 100 ELSE 0 END AS persentase_indikator')
            )
            ->get();

        // Step 2: Group by Komponen and calculate the average of persentase_indikator
        $grouped = $indikators->groupBy('komponen')->map(function ($group) {
            $average = $group->avg('persentase_indikator');
            return [
                'komponen' => $group->first()->komponen,
                'persentase' => round($average, 2)
            ];
        })->values();

        return view('pages.beranda', [
            'keluaran_tables' => $keluaran_table,
            'tahun_list' => $tahun_list,
            'selected_tahun' => $tahun,
            'data' => $grouped
        ]);
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

    public function unduh(Request $request)
    {
        return view('pages.unduh');
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


    public function grafik(Request $request)
    {
        // Step 1: Get each indicator's percentage
        $indikators = DB::table('monev_indikators')
            ->leftJoin('monev_komponens', 'monev_indikators.id_komponen', '=', 'monev_komponens.id')
            ->select(
                'monev_komponens.komponen',
                DB::raw('monev_indikators.capaian'),
                DB::raw('monev_indikators.target'),
                DB::raw('CASE WHEN monev_indikators.target > 0 THEN (monev_indikators.capaian / monev_indikators.target) * 100 ELSE 0 END AS persentase_indikator')
            )
            ->get();

        // Step 2: Group by Komponen and calculate the average of persentase_indikator
        $grouped = $indikators->groupBy('komponen')->map(function ($group) {
            $average = $group->avg('persentase_indikator');
            return [
                'komponen' => $group->first()->komponen,
                'persentase' => round($average, 2)
            ];
        })->values();

        // Step 3: Pass the correct data to the view
        return view('pages.beranda_grafik', ['data' => $grouped]);
    }

    public function map(Request $request)
    {
        return view('pages.map2');
    }

}
