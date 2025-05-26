<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $cari = $request->kata;

        $query = DB::table('monev_indikators')
            ->select(
                'id',
                'indikator',
                'target',
                'satuan',
                'jenis_dokumen'
            );

        if (!empty($cari)) {
            $query->where(function($q) use ($cari) {
                $q->where('indikator', 'like', '%'.$cari.'%')
                ->orWhere('target', 'like', '%'.$cari.'%')
                ->orWhere('satuan', 'like', '%'.$cari.'%')
                ->orWhere('jenis_dokumen', 'like', '%'.$cari.'%');
            });
        }

        $indikator_dampak = $query->paginate(5);

        return view('admin.index', [
            'indikator_dampaks' => $indikator_dampak,
            'kata' => $cari
        ]);
    }

    public function editIndikator($id)
    {
        $indikator = DB::table('monev_indikators')
            ->select(
                'id',
                'indikator as indikator_dampak',
                'target',
                'satuan',
                'jenis_dokumen'
            )
            ->where('id', $id)
            ->first();

        if (!$indikator) {
            abort(404);
        }

        return view('admin.edit_indikator', ['data' => $indikator]);
    }

    public function updateIndikator(Request $request, $id)
    {
        $request->validate([
            'target' => 'required',
            'satuan' => 'required',
            'jenis_dokumen' => 'required'
        ]);

        $updated = DB::table('monev_indikators')
            ->where('id', $id)
            ->update([
                'target' => $request->target,
                'satuan' => $request->satuan,
                'jenis_dokumen' => $request->jenis_dokumen,
                'updated_at' => now()
            ]);

        if ($updated) {
            return redirect()->route('admin')->with('status', 'Indikator berhasil diperbarui');
        }

        return back()->with('error', 'Gagal memperbarui indikator');
    }

    public function verifikasiIndikator(Request $request)
    {
        // Get all indicator submissions with related data
        $submissions = DB::table('monev_indikator_submissions as mis')
            ->join('monev_indikators as mi', 'mis.indikator_id', '=', 'mi.id')
            ->join('users', 'mis.user_id', '=', 'users.id')
            ->select(
                'mis.id',
                'mi.indikator',
                'mis.tahun',
                'mi.target',
                'mis.capaian',
                'mi.satuan',
                'mis.dokumen_pendukung',
                DB::raw("CASE 
                    WHEN mis.status = 0 THEN 'Menunggu'
                    WHEN mis.status = 1 THEN 'Diverifikasi'
                    WHEN mis.status = 2 THEN 'Direvisi'
                    ELSE 'Unknown'
                END as status"),
                'users.name as diverifikasi_oleh',
                'mis.status as status_code' // For action buttons
            )
            ->orderBy('mis.created_at', 'desc')
            ->paginate(10); // Adjust pagination as needed

        return view('admin.verifikasi_indikator', [
            'submissions' => $submissions
        ]);
    }

    public function approveIndikator($id)
    {
        DB::beginTransaction();
        try {
            // Get the submission data
            $submission = DB::table('monev_indikator_submissions')
                ->where('id', $id)
                ->first();

            if (!$submission) {
                return redirect()->back()->with('error', 'Submission not found');
            }

            // Update submission status
            DB::table('monev_indikator_submissions')
                ->where('id', $id)
                ->update([
                    'status' => 1, // Approved
                    'updated_at' => now()
                ]);

            // Update main indikator table
            DB::table('monev_indikators')
                ->where('id', $submission->indikator_id)
                ->update([
                    'capaian' => $submission->capaian,
                    'dokumen_pendukung' => $submission->dokumen_pendukung,
                    'status' => 1, // Approved
                    'updated_at' => now()
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Submission approved successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to approve: ' . $e->getMessage());
        }
    }

    public function rejectIndikator($id)
    {
        DB::beginTransaction();
        try {
            // Get the submission data
            $submission = DB::table('monev_indikator_submissions')
                ->where('id', $id)
                ->first();

            if (!$submission) {
                return redirect()->back()->with('error', 'Submission not found');
            }

            // Update submission status
            DB::table('monev_indikator_submissions')
                ->where('id', $id)
                ->update([
                    'status' => 2, // Rejected
                    'updated_at' => now()
                ]);

            // Update main indikator table
            DB::table('monev_indikators')
                ->where('id', $submission->indikator_id)
                ->update([
                    'status' => 2, // Rejected
                    'updated_at' => now()
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Submission rejected');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to reject: ' . $e->getMessage());
        }
    }

    public function daftarKegiatan(Request $request)
    {
        $cari = $request->kata;

        $query = DB::table('monev_indikator_keluarans')
            ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->leftJoin('monev_instansis', 'monev_indikator_keluarans.id_instansi', '=', 'monev_instansis.id')
            ->leftJoin('monev_capaians', 'monev_indikator_keluarans.id', '=', 'monev_capaians.id_keluaran')
            ->select(
                'monev_indikator_keluarans.id',
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.satuan',
                'monev_indikator_keluarans.target',
                'monev_indikator_keluarans.tahun',
                'monev_instansis.instansi'
            );

        if (!empty($cari)) {
            $query->where(function($q) use ($cari) {
                $q->where('monev_programs.program', 'like', '%'.$cari.'%')
                ->orWhere('monev_kegiatans.kegiatan', 'like', '%'.$cari.'%')
                ->orWhere('monev_subkegiatans.subkegiatan', 'like', '%'.$cari.'%')
                ->orWhere('monev_indikator_keluarans.indikator_keluaran', 'like', '%'.$cari.'%')
                ->orWhere('monev_indikator_keluarans.target', 'like', '%'.$cari.'%')
                ->orWhere('monev_instansis.instansi', 'like', '%'.$cari.'%')
                ->orWhere('monev_capaians.tahun', 'like', '%'.$cari.'%');
            });
        }

        $kegiatans = $query->paginate(10);

        return view('admin.manajemen_kegiatan', [
            'kegiatans' => $kegiatans,
            'kata' => $cari
        ]);
    }

    public function editKegiatan(Request $request, $id)
    {
        $kegiatan = DB::table('monev_indikator_keluarans')
            ->leftJoin('monev_programs', 'monev_indikator_keluarans.id_program', '=', 'monev_programs.id')
            ->leftJoin('monev_kegiatans', 'monev_indikator_keluarans.id_kegiatan', '=', 'monev_kegiatans.id')
            ->leftJoin('monev_subkegiatans', 'monev_indikator_keluarans.id_subkegiatan', '=', 'monev_subkegiatans.id')
            ->where('monev_indikator_keluarans.id', $id)
            ->select(
                'monev_indikator_keluarans.id',
                'monev_programs.program',
                'monev_kegiatans.kegiatan',
                'monev_subkegiatans.subkegiatan',
                'monev_indikator_keluarans.indikator_keluaran',
                'monev_indikator_keluarans.satuan',
                'monev_indikator_keluarans.target'
            )
            ->first();

        if (!$kegiatan) {
            abort(404);
        }

        return view('admin.edit_kegiatan', ['kegiatan' => $kegiatan]);
    }

    public function updateKegiatan(Request $request, $id)
    {
        $request->validate([
            'satuan' => 'required|string',
            'target' => 'required|string',
        ]);

        DB::table('monev_indikator_keluarans')
            ->where('id', $id)
            ->update([
                'satuan' => $request->satuan,
                'target' => $request->target,
                'updated_at' => now()
            ]);

        return redirect('/admin/kegiatan')->with('status', 'Target kegiatan berhasil diperbarui!');
    }

    public function verifikasiKegiatan(Request $request)
    {
        $submissions = DB::table('monev_keluaran_submissions as mks')
            ->join('monev_indikator_keluarans as mik', 'mks.indikator_keluaran_id', '=', 'mik.id')
            ->join('monev_programs as mp', 'mik.id_program', '=', 'mp.id')
            ->join('monev_kegiatans as mk', 'mik.id_kegiatan', '=', 'mk.id')
            ->join('monev_subkegiatans as msk', 'mik.id_subkegiatan', '=', 'msk.id')
            ->join('monev_instansis as mi', 'mik.id_instansi', '=', 'mi.id')
            ->join('monev_capaians as mc', 'mks.indikator_keluaran_id', '=', 'mc.id')
            ->join('users', 'mks.user_id', '=', 'users.id')
            ->select(
                'mks.id',
                'mp.program',
                'mk.kegiatan',
                'msk.subkegiatan',
                'mik.indikator_keluaran',
                'mi.instansi as pelaksana',
                'mc.sumber_pembiayaan',
                'mks.tahun',
                'mks.capaian',
                'users.name as kontributor',
                DB::raw("CASE 
                    WHEN mks.status = 0 THEN 'Menunggu'
                    WHEN mks.status = 1 THEN 'Diverifikasi'
                    WHEN mks.status = 2 THEN 'Direvisi'
                    ELSE 'Unknown'
                END as status"),
                'mks.status as status_code' // For action buttons
            )
            ->orderBy('mks.created_at', 'desc')
            ->paginate(10);

        return view('admin.verifikasi_kegiatan', [
            'submissions' => $submissions
        ]);
    }

    public function approveKegiatan($id)
    {
        DB::beginTransaction();
        try {
            // Get the submission data
            $submission = DB::table('monev_keluaran_submissions')
                ->where('id', $id)
                ->first();

            if (!$submission) {
                return redirect()->back()->with('error', 'Data submission tidak ditemukan');
            }

            // Update submission status
            DB::table('monev_keluaran_submissions')
                ->where('id', $id)
                ->update([
                    'status' => 1, // Approved
                    'updated_at' => now()
                ]);

            // Update main kegiatan table with submission data
            DB::table('monev_indikator_keluarans')
                ->where('id', $submission->indikator_keluaran_id)
                ->update([
                    'indikator_keluaran' => $submission->indikator_keluaran,
                    'capaian' => $submission->capaian,
                    'status' => 1, // Approved
                    'updated_at' => now()
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Kegiatan berhasil disetujui dan data utama telah diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menyetujui: ' . $e->getMessage());
        }
    }

    public function rejectKegiatan($id)
    {
        DB::beginTransaction();
        try {
            // Get the submission data
            $submission = DB::table('monev_keluaran_submissions')
                ->where('id', $id)
                ->first();

            if (!$submission) {
                return redirect()->back()->with('error', 'Data submission tidak ditemukan');
            }

            // Update submission status
            DB::table('monev_keluaran_submissions')
                ->where('id', $id)
                ->update([
                    'status' => 2, // Rejected
                    'updated_at' => now()
                ]);

            // Update main kegiatan table status only
            DB::table('monev_indikator_keluarans')
                ->where('id', $submission->indikator_keluaran_id)
                ->update([
                    'status' => 2, // Rejected
                    'updated_at' => now()
                ]);

            DB::commit();
            return redirect()->back()->with('success', 'Kegiatan ditolak dan status data utama diperbarui');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menolak: ' . $e->getMessage());
        }
    }

    public function tambahKegiatan(Request $request)
    {
        $komponens = DB::table('monev_komponens')->get();
        $instansis = DB::table('monev_instansis')->get();
        
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
            ->paginate(10);
            
        return view('admin.tambah_kegiatan', [
            'kegiatans' => $kegiatans,
            'komponens' => $komponens,
            'instansis' => $instansis
        ]);
    }

    public function getPrograms($komponen_id)
    {
        $programs = DB::table('monev_programs')
            ->where('id_komponen', $komponen_id)
            ->get();
        
        return response()->json($programs);
    }

    public function getKegiatans($program_id)
    {
        $kegiatans = DB::table('monev_kegiatans')
            ->where('id_program', $program_id)
            ->get();
        
        return response()->json($kegiatans);
    }

    public function getSubkegiatans($kegiatan_id)
    {
        $subkegiatans = DB::table('monev_subkegiatans')
            ->where('id_kegiatan', $kegiatan_id)
            ->get();
        
        return response()->json($subkegiatans);
    }
}
