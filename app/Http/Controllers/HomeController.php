<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.beranda');
    }

    public function perencanaan(Request $request)
    {
        return view('pages.perencanaan');
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
