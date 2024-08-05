<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontributorController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('kontributor.index');
    }

    public function kegiatan(Request $request)
    {
        return view('kontributor.daftar_kegiatan');
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
