<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            'monev_indikators.id',
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

    public function editIndikator($id)
    {
        // Find the specific indikator or fail with 404
        $indikator = DB::table('monev_indikators')->find($id);
        
        if (!$indikator) {
            abort(404);
        }

        return view('kontributor.edit_indikator', ['indikator' => $indikator]);
    }

    public function updateIndikator(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'capaian' => 'required|numeric',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,xlsx,xls,doc,docx,zip|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $updateData = [
                'capaian' => $validated['capaian'],
                'updated_at' => now(),
            ];

            // Handle file upload if present
            if ($request->hasFile('dokumen_pendukung')) {
                // Delete old file if exists
                $oldFile = DB::table('monev_indikators')
                    ->where('id', $id)
                    ->value('dokumen_pendukung');
                
                if ($oldFile && Storage::disk('public')->exists($oldFile)) {
                    Storage::disk('public')->delete($oldFile);
                }

                // Store new file
                $updateData['dokumen_pendukung'] = $request->file('dokumen_pendukung')->store('dokumen', 'public');
            }

            // Update the record
            DB::table('monev_indikators')
                ->where('id', $id)
                ->update($updateData);

            DB::commit();

            return redirect()->route('kontributor')
                ->with('success', 'Data berhasil diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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

        DB::beginTransaction();
        try {
            $user = auth()->user();
            $indikatorId = $request->indikator;

            // Check submission limit
            $submissionCount = DB::table('monev_indikator_submissions')
                ->where('indikator_id', $indikatorId)
                ->where('user_id', $user->id)
                ->count();

            if ($submissionCount >= 2) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Anda hanya bisa menginput 2 kali per indikator.');
            }

            // Handle file upload
            $nama_file = null;
            if ($request->hasFile('dokumen')) {
                $nama_file = $request->file('dokumen')->store('dokumen', 'public');
            }

            // Create new submission
            DB::table('monev_indikator_submissions')->insert([
                'indikator_id' => $indikatorId,
                'user_id' => $user->id,
                'tahun' => $request->tahun,
                'capaian' => $request->capaian,
                'dokumen_pendukung' => $nama_file,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update main table with latest values
            DB::table('monev_indikators')
                ->where('id', $indikatorId)
                ->update([
                    'capaian' => $request->capaian,
                    'dokumen_pendukung' => $nama_file,
                    'updated_at' => now(),
                ]);

            DB::commit();

            return redirect()->route('kontributor')
                ->withFragment('#b')
                ->with('status', 'Capaian indikator berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('kontributor')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function getIndikators(Request $request)
    {
        $user = auth()->user();
        
        $indikators = DB::table('monev_indikators')
            ->select('id', 'indikator', 'id_instansi')
            ->when($user->id_instansi != 99, function ($query) use ($user) {
                return $query->where('id_instansi', $user->id_instansi);
            })
            ->distinct()
            ->orderBy('indikator', 'asc')
            ->get();

        return response()->json($indikators);
    }

    public function getSatuanTarget($id)
    {
        $indikator = DB::table('monev_indikators')
            ->where('id', $id)
            ->first(['satuan', 'target']);

        if (!$indikator) {
            return response()->json([
                'satuan' => '',
                'target' => ''
            ]);
        }

        return response()->json([
            'satuan' => $indikator->satuan,
            'target' => $indikator->target
        ]);
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
                'monev_indikator_keluarans.id',
                'monev_komponens.komponen',
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.target',
                'monev_instansis.instansi',
                'monev_capaians.sumber_pembiayaan',
                'monev_indikator_keluarans.capaian',
                'monev_capaians.status'
            )
            ->paginate(10); // Use pagination
        return view('kontributor.daftar_kegiatan', ['kegiatan_tables' => $kegiatan_tables]);
    }

    public function editKegiatan($id)
    {
        // Find the specific indikator or fail with 404
        $indikator = DB::table('monev_indikator_keluarans')->find($id);
        
        if (!$indikator) {
            abort(404);
        }

        return view('kontributor.edit_kegiatan', ['indikator_keluaran' => $indikator]);
    }

    public function updateKegiatan(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'indikator_keluaran' => 'required',
            'target' => 'required',
            // Add other validation rules as needed
        ]);

        // Update the record
        DB::table('monev_indikator_keluarans')
            ->where('id', $id)
            ->update($validated);

        return redirect()->route('kontributor.kegiatan')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function getKegiatan(Request $request)
    {
        $user = auth()->user();
        
        $kegiatan = DB::table('monev_indikator_keluarans')
            ->select(
                'monev_indikator_keluarans.id',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.id_instansi'
            )
            ->when($user->id_instansi != 99, function ($query) use ($user) {
                return $query->where('monev_indikator_keluarans.id_instansi', $user->id_instansi);
            })
            ->distinct()
            ->orderBy('indikator_keluaran', 'asc')
            ->get();

        return response()->json($kegiatan);
    }

    public function storeKegiatan(Request $request)
    {
        $request->validate([
            'indikator' => 'required|exists:monev_indikator_keluarans,id',
            'tahun' => 'required|digits:4|integer',
            'capaian' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $user = auth()->user();
            $indikatorkeluaranId = $request->indikator;

            // Check submission limit
            $submissionCount = DB::table('monev_keluaran_submissions')
                ->where('indikator_keluaran_id', $indikatorkeluaranId)
                ->where('user_id', $user->id)
                ->count();

            if ($submissionCount >= 2) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Anda hanya bisa menginput 2 kali per indikator kegiatan.');
            }

            // Create new submission with minimal required fields
            DB::table('monev_keluaran_submissions')->insert([
                'indikator_keluaran_id' => $indikatorkeluaranId,
                'user_id' => $user->id,
                'tahun' => $request->tahun,
                'capaian' => $request->capaian,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update main table with latest capaian
            DB::table('monev_indikator_keluarans')
                ->where('id', $indikatorkeluaranId)
                ->update([
                    'capaian' => $request->capaian,
                    'updated_at' => now(),
                ]);

            DB::commit();

            return redirect()->route('kegiatan')
                ->withFragment('#b')
                ->with('status', 'Capaian kegiatan berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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

    public function exportToExcel()
    {
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
                    'monev_indikator_keluarans.target',
                    'monev_instansis.instansi',
                    'monev_capaians.sumber_pembiayaan',
                    'monev_indikator_keluarans.capaian'
                )
                ->get();
        
        $filename = "tabel_kegiatan.csv";
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');

            // Add UTF-8 BOM for Excel compatibility
            fwrite($file, "\xEF\xBB\xBF");
            
            // Headers
            fputcsv($file, [
                'Komponen',
                'Program',
                'Kegiatan',
                'Sub Kegiatan',
                'Indikator Keluaran',
                'Pelaksana',
                'Target',
                'Capaian',
                'Sumber Pendanaan',
            ], ';'); // <-- Semicolon as delimiter

            // Data Rows
            foreach ($data as $row) {
                fputcsv($file, [
                    $row->komponen,
                    $row->program,
                    $row->kegiatan,
                    $row->subkegiatan,
                    $row->indikator_keluaran,
                    $row->instansi,
                    $row->target,
                    $row->capaian,
                    $row->sumber_pembiayaan,
                ], ';'); // <-- Semicolon as delimiter
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
