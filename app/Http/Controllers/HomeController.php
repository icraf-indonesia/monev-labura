<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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
                'monev_indikator_keluarans.capaian',
                'monev_indikator_keluarans.tahun'
            );

        if ($tahun) {
            $keluaran_table->where('monev_capaians.tahun', $tahun);
        }

        $keluaran_table = $keluaran_table->get();

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

        // Get component data per year
        $components = DB::table('monev_komponens')->pluck('komponen', 'id');
        $componentData = [];

        foreach ($components as $id => $komponen) {
            $data = DB::table('monev_indikator_keluarans')
                ->select(
                    'tahun',
                    DB::raw('CASE WHEN SUM(target) > 0 THEN 
                        (SUM(capaian) / SUM(target)) * 100 ELSE 0 END AS persentase')
                )
                ->where('id_komponen', $id)
                ->groupBy('tahun')
                ->orderBy('tahun')
                ->get();

            $componentData[$komponen] = $data;
        }

        // Data untuk grafik indikator per tahun
        $indikators = DB::table('monev_indikators')
        ->select(
            'id',
            'indikator',
            'tahun',
            'capaian',
            'target',
            DB::raw('CASE WHEN target > 0 THEN (capaian / target) * 100 ELSE 0 END AS persentase')
        )
        ->orderBy('indikator')
        ->orderBy('tahun')
        ->get();

    // Kelompokkan data per indikator
    $indikatorData = [];
    foreach ($indikators as $item) {
        if (!isset($indikatorData[$item->indikator])) {
            $indikatorData[$item->indikator] = [
                'labels' => [],
                'data' => []
            ];
        }
        
        $indikatorData[$item->indikator]['labels'][] = $item->tahun;
        $indikatorData[$item->indikator]['data'][] = $item->persentase;
    }

        // dd($data);
        // dd($componentData);
        // dd($indicators);
        // dd($indikatorData);

        return view('pages.beranda', [
            'keluaran_tables' => $keluaran_table,
            'tahun_list' => $tahun_list,
            'selected_tahun' => $tahun,
            'grafik' => $grouped,
            'componentData' => $componentData,
            'indikatorData' => $indikatorData
        ]);
    }

    public function perencanaan(Request $request)
    {
        $perencanaan_table = DB::table('list_indikator_keluarans')
            ->leftJoin('monev_programs', 'list_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'list_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'list_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->leftJoin('monev_instansis', 'list_indikator_keluarans.id_instansi', '=', 'monev_instansis.id')
            ->leftJoin('monev_capaians', 'list_indikator_keluarans.id_keluaran', '=', 'monev_capaians.id_keluaran')
            ->select(
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'list_indikator_keluarans.indikator_keluaran',
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
