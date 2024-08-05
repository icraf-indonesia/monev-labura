<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.index');
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
        return view('admin.manajemen_kegiatan');
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
