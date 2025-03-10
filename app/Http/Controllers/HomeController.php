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

        // return view('pages.beranda', ['keluaran_tables' => $keluaran_table]);
        return view('pages.beranda', [
            'keluaran_tables' => $keluaran_table,
            'tahun_list' => $tahun_list,
            'selected_tahun' => $tahun
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

    // public function grafik(Request $request)
    // {
    //     $kegiatan_tables = DB::table('monev_indikator_keluarans')
    //         ->leftJoin('monev_komponens', 'monev_indikator_keluarans.id_komponen', '=', 'monev_komponens.id')
    //         ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
    //         ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
    //         ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
    //         ->leftJoin('monev_instansis', 'monev_indikator_keluarans.id_instansi', '=', 'monev_instansis.id')
    //         ->leftJoin('monev_capaians', 'monev_indikator_keluarans.id', '=', 'monev_capaians.id_keluaran')
    //         ->select(
    //             'monev_komponens.komponen',
    //             'monev_programs.program',
    //             'monev_kegiatans.kegiatan',
    //             'monev_subkegiatans.subkegiatan',
    //             'monev_indikator_keluarans.indikator_keluaran',
    //             'monev_indikator_keluarans.target',
    //             'monev_instansis.instansi',
    //             'monev_capaians.sumber_pembiayaan',
    //             'monev_capaians.capaian',
    //             'monev_capaians.status'
    //         )
    //         ->get();
            
    //     // Calculate component-wise achievement (average per component)
    //     $komponen_data = DB::table('monev_capaians')
    //         ->join('monev_indikator_keluarans', 'monev_capaians.id_keluaran', '=', 'monev_indikator_keluarans.id')
    //         ->join('monev_komponens', 'monev_indikator_keluarans.id_komponen', '=', 'monev_komponens.id')
    //         ->select(
    //             'monev_komponens.komponen',
    //             DB::raw('AVG(monev_capaians.capaian * 100) as avg_persentase')
    //         )
    //         ->groupBy('monev_komponens.komponen')
    //         ->get();
    //     dd($komponen_data);    
    //     // Calculate the final "capaian_kumulatif" as the average of component achievements
    //     $capaian_kumulatif = round($komponen_data->avg('avg_persentase'), 2);

    //     // Prepare data for the bar chart
    //     $komponen_chart = $komponen_data->map(function ($item) {
    //         return [
    //             'komponen' => $item->komponen,
    //             'persentase' => round($item->avg_persentase, 2),
    //         ];
    //     })->toArray();

    //     return view('pages.beranda_grafik', [
    //         'kegiatan_tables' => $kegiatan_tables,
    //         'capaian_kumulatif' => $capaian_kumulatif,
    //         'komponen_chart' => $komponen_chart
    //     ]);
    // }

    public function grafik(Request $request)
    {
        $kegiatan_tables = DB::table('monev_indikator_keluarans')
            ->leftJoin('monev_komponens', 'monev_indikator_keluarans.id_komponen', '=', 'monev_komponens.id')
            ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->leftJoin('monev_instansis', 'monev_indikator_keluarans.id_instansi', '=', 'monev_instansis.id')
            ->leftJoin('monev_capaians', 'monev_indikator_keluarans.id', '=', 'monev_capaians.id_keluaran')
            ->select(
                'monev_komponens.komponen',
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.target',
                'monev_instansis.instansi',
                'monev_capaians.sumber_pembiayaan',
                'monev_capaians.capaian',
                'monev_capaians.status',
                DB::raw('ROUND((monev_capaians.capaian / NULLIF(monev_indikator_keluarans.target, 0)) * 100, 2) as persentase')
            )
            ->get();
        
            dd($kegiatan_tables);
        // Calculate component-wise achievement (average per component)
        $komponen_data = DB::table('monev_capaians')
            ->join('monev_indikator_keluarans', 'monev_capaians.id_keluaran', '=', 'monev_indikator_keluarans.id')
            ->join('monev_komponens', 'monev_indikator_keluarans.id_komponen', '=', 'monev_komponens.id')
            ->select(
                'monev_komponens.komponen',
                DB::raw('AVG(monev_capaians.capaian / NULLIF(monev_indikator_keluarans.target, 0) * 100) as avg_persentase')
            )
            ->groupBy('monev_komponens.komponen')
            ->get();

        // Calculate the final "capaian_kumulatif" as the average of component achievements
        $capaian_kumulatif = round($komponen_data->avg('avg_persentase'), 2);

        // Prepare data for the bar chart
        $komponen_chart = $komponen_data->map(function ($item) {
            return [
                'komponen' => $item->komponen,
                'persentase' => round($item->avg_persentase, 2),
            ];
        })->toArray();

        return view('pages.beranda_grafik', [
            'kegiatan_tables' => $kegiatan_tables,
            'capaian_kumulatif' => $capaian_kumulatif,
            'komponen_chart' => $komponen_chart
        ]);
    }

}
