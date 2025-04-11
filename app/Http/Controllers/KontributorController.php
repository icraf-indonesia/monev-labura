<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MonevIndikator;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
            'monev_indikators.status'
        )
        ->paginate(5); // Use pagination
        return view('kontributor.index', ['indikator_dampaks' => $indikator_dampak]);
    }

    public function kegiatan(Request $request)
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
                'monev_capaians.status'
            )
            ->paginate(5); // Use pagination
        return view('kontributor.daftar_kegiatan', ['kegiatan_tables' => $kegiatan_tables]);
    }

    public function inputIndikator(Request $request)
    {
        $input_indikators = DB::table('monev_indikators')
        ->select(
            'id',
            'indikator',
            'target',
            'satuan',
            'tahun',
            'capaian',
            'dokumen_pendukung'
        )
        ->get(); // Execute the query and get the results
        return view('kontributor.input_indikator', ['inputindikator_tables' => $input_indikators]);
    }

        public function storeIndikator(Request $request)
    {
        $request->validate([
            'indikator' => 'required|exists:monev_indikators,id',
            'tahun' => 'required|digits:4|integer',
            'capaian' => 'required|numeric',
            'dokumen' => 'nullable|file|mimes:pdf,xlsx,xls,doc,docx,zip|max:5120',
        ]);

        try {
            // Retrieve indikator name safely
            $detail_indikator = optional(DB::table('monev_indikators')->where('id', $request->indikator)->first())->indikator;

            // Handle file upload
            $nama_file = null;
            if ($request->hasFile('dokumen')) {
                $nama_file = $request->file('dokumen')->store('dokumen', 'public');
            }

            // Insert into database
            MonevIndikator::create([
                'indikator' => $detail_indikator,
                'id_komponen' => $request->id_komponen ?? 1,
                'id_instansi' => $request->id_instansi ?? 2,
                'target' => $request->target ?? 10,       
                'satuan' => $request->satuan ?? 0,
                'tahun' => $request->tahun,
                'capaian' => $request->capaian,
                'dokumen_pendukung' => $nama_file,
                'status' => 0
            ]);

            return redirect()->route('kontributor')->withFragment('#b')->with('status', 'Capaian indikator berhasil ditambah.');
        
        } catch (\Exception $e) {
            return redirect()->route('kontributor')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    //     public function getIndikators()
    // {
    //     $indikators = DB::table('monev_indikators')
    //         ->select('indikator') // Select only the "indikator" column
    //         ->distinct() // Ensure unique values
    //         ->orderBy('indikator', 'asc') // Optional: Sort alphabetically
    //         ->pluck('indikator'); // Return only values, not full objects

    //     return response()->json($indikators);
    // }

    // public function satuan($id)
    // {
    //     $data = DB::table('monev_indikators')
    //         ->where('id', $id)
    //         ->select('satuan', 'target')
    //         ->first();

    //     if ($data) {
    //         return response()->json([
    //             'satuan' => $data->satuan,
    //             'target' => $data->target
    //         ]);
    //     }

    //     return response()->json([]);
    // }

        public function getIndikators()
    {
        $indikators = DB::table('monev_indikators')
            ->select('id', 'indikator', 'id_instansi') // Selecting ID and Indikator
            ->distinct()
            ->orderBy('indikator', 'asc')
            ->get(); // Fetching as array of objects

        return response()->json($indikators);
    }

    public function satuan($id)
    {
        $data = DB::table('monev_indikators')
            ->where('id', $id)
            ->select('satuan', 'target')
            ->first();

        return response()->json($data ?: []);
    }

    public function inputKegiatan(Request $request)
    {
        $input_kegiatans = DB::table('monev_indikator_keluarans')
            ->leftJoin('monev_komponens', 'monev_indikator_keluarans.id_komponen', '=', 'monev_komponens.id')
            ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->leftJoin('monev_instansis', 'monev_indikator_keluarans.id_instansi', '=', 'monev_instansis.id')
            ->leftJoin('monev_capaians', 'monev_indikator_keluarans.id', '=', 'monev_capaians.id_keluaran')
            ->select(
                'monev_indikator_keluarans.id',
                'monev_komponens.komponen',
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_instansis.instansi',
                'monev_capaians.sumber_pembiayaan'
            )
        // ->get()->unique('komponen'); // Execute the query and get the results
        ->get();
        return view('kontributor.input_pelaksanaan_kegiatan', ['inputkegiatan_tables' => $input_kegiatans]);
    }

    public function getIndikatorDetail(Request $request)
    {
        $id = $request->id;

        $data = DB::table('monev_indikator_keluarans')
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
                'monev_instansis.instansi',
                'monev_capaians.sumber_pembiayaan',
                'monev_indikator_keluarans.target',
            )
            ->where('monev_indikator_keluarans.id', $id)
            ->first();

        return response()->json($data);
    }

    public function getPrograms(Request $request)
    {
        $programs = DB::table('monev_programs')
            ->where('id_komponen', $request->komponen_id)
            ->pluck('program', 'id'); 

        return response()->json($programs);
    }

    public function getKegiatans(Request $request)
    {
        $kegiatans = DB::table('monev_kegiatans')
            ->where('id_program', $request->program_id)
            ->pluck('kegiatan', 'id'); 

        return response()->json($kegiatans);
    }

    public function getSubkegiatans(Request $request)
    {
        $subkegiatans = DB::table('monev_subkegiatans')
            ->where('id_kegiatan', $request->kegiatan_id)
            ->pluck('subkegiatan', 'id'); 

        return response()->json($subkegiatans);
    }

    public function getIndikator(Request $request)
    {
        $indikator = DB::table('monev_indikator_keluarans')
            ->where('id_subkegiatan', $request->subkegiatan_id)
            ->value('indikator_keluaran'); 

        return response()->json(['indikator' => $indikator]);
    }

}
