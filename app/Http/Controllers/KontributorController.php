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

        $query = DB::table('monev_indikators')
            ->select(
                'monev_indikators.id',
                'monev_indikators.indikator',
                'monev_indikators.target',
                'monev_indikators.satuan',
                'monev_indikators.tahun',
                'monev_indikators.capaian',
                'monev_indikators.dokumen_pendukung',
                'monev_indikators.jenis_dokumen',
                'monev_indikators.id_instansi',
                'monev_indikators.status'
            );

        // Add search condition if search term exists
        if (!empty($cari)) {
            $query->where(function($q) use ($cari) {
                $q->where('indikator', 'like', '%'.$cari.'%')
                ->orWhere('tahun', 'like', '%'.$cari.'%')
                ->orWhere('target', 'like', '%'.$cari.'%')
                ->orWhere('capaian', 'like', '%'.$cari.'%')
                ->orWhere('satuan', 'like', '%'.$cari.'%');
            });
        }

        $indikator_dampak = $query->paginate(5);

        // Check if current user's instansi is 99
        $currentUserInstansiId = auth()->user()->id_instansi;
        $isSpecialUser = ($currentUserInstansiId == 99);

        return view('kontributor.index', [
            'indikator_dampaks' => $indikator_dampak,
            'currentUserInstansiId' => $currentUserInstansiId,
            'isSpecialUser' => $isSpecialUser,
            'kata' => $cari // Pass the search term back to the view
        ]);
    }

    public function editIndikator($id)
    {
        // Find the specific indikator or fail with 404
        $indikator = DB::table('monev_indikators')->find($id);
        
        if (!$indikator) {
            abort(404);
        }

        return view('kontributor.edit_indikator', [
            'indikator' => $indikator,
            'target' => $indikator->target // Make sure this field exists in your table
        ]);
    }

    public function updateIndikator(Request $request, $id)
    {
        $user = auth()->user();
    
        // Check if user ID is 99
        if ($user->id_instansi == 99) {
            return redirect()->back()
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui indikator ini.');
        }

        // Validate the request data
        $validated = $request->validate([
            'capaian' => 'required|numeric',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,xlsx,xls,doc,docx,zip|max:5120',
        ]);

        DB::beginTransaction();
        try {
            $user = auth()->user();
            $updateData = [
                'capaian' => $validated['capaian'],
                'status' => 0, // Reset status to pending
                'updated_at' => now(),
            ];

            $dokumenPath = null;

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
                $dokumenPath = $request->file('dokumen_pendukung')->store('dokumen', 'public');
                $updateData['dokumen_pendukung'] = $dokumenPath;
            } else {
                // Keep existing document path if no new file uploaded
                $dokumenPath = DB::table('monev_indikators')
                    ->where('id', $id)
                    ->value('dokumen_pendukung');
            }

            // Update the main indikator record
            DB::table('monev_indikators')
                ->where('id', $id)
                ->update($updateData);

            // Create or update submission record
            $submissionData = [
                'capaian' => $validated['capaian'],
                'dokumen_pendukung' => $dokumenPath,
                'status' => 0, // Reset status to pending in submissions
                'updated_at' => now(),
            ];

            // Check if submission exists for this user and indikator
            $existingSubmission = DB::table('monev_indikator_submissions')
                ->where('indikator_id', $id)
                ->where('user_id', $user->id)
                ->first();

            if ($existingSubmission) {
                // Update existing submission
                DB::table('monev_indikator_submissions')
                    ->where('id', $existingSubmission->id)
                    ->update($submissionData);
            } else {
                // Create new submission
                $submissionData['indikator_id'] = $id;
                $submissionData['user_id'] = $user->id;
                $submissionData['tahun'] = date('Y');
                $submissionData['created_at'] = now();
                
                DB::table('monev_indikator_submissions')->insert($submissionData);
            }

            DB::commit();

            return redirect()->route('kontributor')
                ->with('status', 'Data berhasil diperbarui dan status direset menjadi menunggu review');

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
    $user = auth()->user();

    // Check if user ID is 99
    if ($user->id_instansi == 99) {
        return redirect()->back()
            ->with('error', 'Anda tidak memiliki izin untuk memperbarui indikator ini.');
    }

    $request->validate([
        'indikator' => 'required|exists:monev_indikators,id',
        'tahun' => 'required|digits:4|integer',
        'capaian' => 'required|numeric',
        'dokumen' => 'nullable|file|mimes:pdf,xlsx,xls,doc,docx,zip|max:5120',
    ]);

    DB::beginTransaction();
    try {
        $indikatorId = $request->indikator;

        // Check submission limit for this indikator_id and tahun
        $submissionCount = DB::table('monev_indikator_submissions')
            ->where('indikator_id', $indikatorId)
            ->where('user_id', $user->id)
            ->where('tahun', $request->tahun)
            ->count();

        if ($submissionCount >= 2) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Anda hanya bisa menginput 2 kali per indikator per tahun.');
        }

        // Handle file upload
        $nama_file = null;
        if ($request->hasFile('dokumen')) {
            $nama_file = $request->file('dokumen')->store('dokumen', 'public');
        }

        // Get base indikator data
        $baseIndikator = DB::table('monev_indikators')->where('id', $indikatorId)->first();

        // Check if record exists for this year and indikator
        $existingRecord = DB::table('monev_indikators')
            ->where('id', $indikatorId)
            ->where('tahun', $request->tahun)
            ->first();

        if (!$existingRecord) {
            // Create new record for this year
            $newIndikatorId = DB::table('monev_indikators')->insertGetId([
                'indikator' => $baseIndikator->indikator,
                'id_indikator' => $indikatorId,
                'id_komponen' => $baseIndikator->id_komponen,
                'id_instansi' => $baseIndikator->id_instansi,
                'target' => $baseIndikator->target,
                'satuan' => $baseIndikator->satuan,
                'tahun' => $request->tahun,
                'capaian' => $request->capaian,
                'dokumen_pendukung' => $nama_file,
                'jenis_dokumen' => $baseIndikator->jenis_dokumen,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Use the original indikatorId for submission, not the new one
            // $indikatorId tetap menggunakan yang dari form
        }

        // Create submission record - menggunakan indikator_id dari form
        DB::table('monev_indikator_submissions')->insert([
            'indikator_id' => $indikatorId, // Selalu gunakan ID dari form
            'user_id' => $user->id,
            'tahun' => $request->tahun,
            'capaian' => $request->capaian,
            'dokumen_pendukung' => $nama_file,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Update main table jika record sudah ada untuk tahun ini
        if ($existingRecord) {
            DB::table('monev_indikators')
                ->where('id', $indikatorId)
                ->update([
                    'capaian' => $request->capaian,
                    'dokumen_pendukung' => $nama_file,
                    'updated_at' => now(),
                ]);
        }

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
        
        $indikators = DB::table('list_indikator_dampaks')
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
                'monev_indikator_keluarans.satuan'
            )
            ->where('monev_indikator_keluarans.id', $id)
            ->first();

        return response()->json($data);
    }

    public function kegiatan(Request $request)
    {
        $cari = $request->kata;

        $query = DB::table('monev_indikator_keluarans')
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
                'monev_indikator_keluarans.satuan',
                'monev_indikator_keluarans.capaian',
                'monev_indikator_keluarans.tahun',
                'monev_indikator_keluarans.status',
                'monev_indikator_keluarans.id_instansi' // Add this to check ownership
            );

        // Add search condition if search term exists
        if (!empty($cari)) {
            $query->where(function($q) use ($cari) {
                $q->where('monev_indikator_keluarans.indikator_keluaran', 'like', '%'.$cari.'%')
                ->orWhere('monev_komponens.komponen', 'like', '%'.$cari.'%')
                ->orWhere('monev_programs.program', 'like', '%'.$cari.'%')
                ->orWhere('monev_kegiatans.kegiatan', 'like', '%'.$cari.'%')
                ->orWhere('monev_subkegiatans.subkegiatan', 'like', '%'.$cari.'%')
                ->orWhere('monev_instansis.instansi', 'like', '%'.$cari.'%')
                ->orWhere('monev_capaians.sumber_pembiayaan', 'like', '%'.$cari.'%')
                ->orWhere('monev_indikator_keluarans.target', 'like', '%'.$cari.'%')
                ->orWhere('monev_indikator_keluarans.capaian', 'like', '%'.$cari.'%');
            });
        }

        $kegiatan_tables = $query->paginate(10);

        // Check if current user's instansi is 99
        $currentUserInstansiId = auth()->user()->id_instansi;
        $isSpecialUser = ($currentUserInstansiId == 99);

        return view('kontributor.daftar_kegiatan', [
            'kegiatan_tables' => $kegiatan_tables,
            'kata' => $cari, // Pass the search term back to the view
            'isSpecialUser' => $isSpecialUser,
            'currentUserInstansiId' => $currentUserInstansiId
        ]);
    }

    public function editKegiatan($id)
    {
        // Find the specific indikator or fail with 404
        $indikator = DB::table('monev_indikator_keluarans')->find($id);
        
        if (!$indikator) {
            abort(404);
        }

        return view('kontributor.edit_kegiatan', [
            'indikator_keluaran' => $indikator,
            'target' => $indikator->target
        ]);
    }

    public function updateKegiatan(Request $request, $id)
    {
        $user = auth()->user();
    
        // Check if user ID is 99
        if ($user->id_instansi == 99) {
            return redirect()->back()
                ->with('error', 'Anda tidak memiliki izin untuk memperbarui kegiatan ini.');
        }

        // Validate the request data
        $validated = $request->validate([
            'capaian' => 'required|integer'
        ]);

        DB::beginTransaction();
        try {
            $user = auth()->user();
            $updateData = [
                'capaian' => $validated['capaian'],
                'status' => 0, // Reset status to pending
                'updated_at' => now(),
            ];

            // Update the main kegiatan record
            // $updated = DB::table('monev_indikator_keluarans')
            DB::table('monev_indikator_keluarans')
                ->where('id', $id)
                ->update($updateData);

            // if ($updated === 0) {
            //     throw new \Exception('Tidak ada data yang diupdate');
            // }

            // Create or update submission record
            $submissionData = [
                'capaian' => $validated['capaian'],
                'status' => 0, // Reset status to pending
                'updated_at' => now(),
            ];

            // Check if submission exists for this user and kegiatan
            $existingSubmission = DB::table('monev_keluaran_submissions')
                ->where('indikator_keluaran_id', $id)
                ->where('user_id', $user->id)
                ->first();

            if ($existingSubmission) {
                // Update existing submission
                DB::table('monev_keluaran_submissions')
                    ->where('id', $existingSubmission->id)
                    ->update($submissionData);
            } else {
                // Create new submission
                $submissionData['indikator_keluaran_id'] = $id;
                $submissionData['user_id'] = $user->id;
                $submissionData['tahun'] = date('Y');
                $submissionData['created_at'] = now();
                
                DB::table('monev_keluaran_submissions')->insert($submissionData);
            }

            DB::commit();

            return redirect()->route('kegiatan')
                ->with('status', 'Data capaian berhasil diperbarui dan dikirim untuk review');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                // ->withInput()
                ->with('error', 'Gagal mengupdate data: ' . $e->getMessage());
        }
    }

    public function getKegiatan(Request $request)
    {
        $user = auth()->user();
        
        $kegiatan = DB::table('list_indikator_keluarans')
            ->select('id', 'indikator_keluaran', 'id_instansi')
            ->when($user->id_instansi != 99, function ($query) use ($user) {
                return $query->where('id_instansi', $user->id_instansi);
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
            $tahun = $request->tahun;

            // Get the original indikator data
            $originalIndikator = DB::table('monev_indikator_keluarans')
                ->where('id', $indikatorkeluaranId)
                ->first();

            if (!$originalIndikator) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Indikator tidak ditemukan.');
            }

            // Check if a record exists for this indikator and year
            $existingRecord = DB::table('monev_indikator_keluarans')
                ->where('indikator_keluaran', $originalIndikator->indikator_keluaran)
                ->where('tahun', $tahun)
                ->where('id_komponen', $originalIndikator->id_komponen)
                ->where('id_program', $originalIndikator->id_program)
                ->where('id_kegiatan', $originalIndikator->id_kegiatan)
                ->where('id_subkegiatan', $originalIndikator->id_subkegiatan)
                ->where('id_instansi', $originalIndikator->id_instansi)
                ->first();

            $targetIndikatorId = $indikatorkeluaranId;

            // If no record exists, create a new one
            if (!$existingRecord) {
                $targetIndikatorId = DB::table('monev_indikator_keluarans')->insertGetId([
                    'indikator_keluaran' => $originalIndikator->indikator_keluaran,
                    'target' => $originalIndikator->target,
                    'capaian' => $request->capaian,
                    'tahun' => $tahun,
                    'satuan' => $originalIndikator->satuan,
                    'id_komponen' => $originalIndikator->id_komponen,
                    'id_program' => $originalIndikator->id_program,
                    'id_kegiatan' => $originalIndikator->id_kegiatan,
                    'id_subkegiatan' => $originalIndikator->id_subkegiatan,
                    'id_instansi' => $originalIndikator->id_instansi,
                    'status' => $originalIndikator->status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                $targetIndikatorId = $existingRecord->id;
            }

            // Check submission limit
            $submissionCount = DB::table('monev_keluaran_submissions')
                ->where('indikator_keluaran_id', $targetIndikatorId)
                ->where('user_id', $user->id)
                ->count();

            if ($submissionCount >= 2) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Anda hanya bisa menginput 2 kali per indikator kegiatan.');
            }

            // Create new submission with minimal required fields
            DB::table('monev_keluaran_submissions')->insert([
                'indikator_keluaran_id' => $targetIndikatorId,
                'user_id' => $user->id,
                'tahun' => $tahun,
                'capaian' => $request->capaian,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Update main table with latest capaian
            DB::table('monev_indikator_keluarans')
                ->where('id', $targetIndikatorId)
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
