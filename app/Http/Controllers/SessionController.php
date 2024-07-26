<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("session/login");
    }

    function login(Request $request)
    {
        Session::flash('username', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'username'=>$request->username,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)){
            //otentikasi sukses
            return redirect('')->with('success','Berhasil login');

        } else {
            //otentikasi gagal
            return redirect('session')->withErrors('Username dan password yang dimasukan tidak valid');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('session')->with('success','Berhasil keluar');
    }
}
