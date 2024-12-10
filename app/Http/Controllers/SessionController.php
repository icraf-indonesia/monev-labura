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
        // Flash the username to session for reuse
        Session::flash('username', $request->username);
        
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        // Simulate login process (replace with actual authentication logic)
        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        // if (Auth::attempt($infologin)) {
        //     // Authentication successful
        //     return redirect('')->with('success', 'Berhasil login');
        // } else {
        //     // Authentication failed
        //     return redirect('session')->withErrors('Username dan password yang dimasukan tidak valid')->withInput();
        // }

        if (Auth::attempt($infologin)) {
            // Login successful
            return redirect('')->with('success', 'Berhasil login!');
        } else {
            // Login failed
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('session')->with('success', 'Berhasil keluar');
    }
}