<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
                ->join('stakeholders', 'users.id_stakeholder', '=', 'stakeholders.id')
                ->paginate(10);
        return view('admin.user', ['user' => $user]);
    }

    public function tambahUser()
    {
        $stakeholder = DB::table('stakeholders')->select('id', 'stakeholder')->get();
        $lembaga = DB::table('lembaga')->select('id', 'lembaga')->get();

        return view('admin.tambah_user', [
            'stakeholder' => $stakeholder,
            'lembaga' => $lembaga
        ]);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'id_stakeholder' => 'required',
            'id_lembaga' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'id_stakeholder' => $request->id_stakeholder,
            'id_lembaga' => $request->id_lembaga
        ]);

        return redirect('/admin/user')->with('status' ,'User baru berhasil ditambah.');
    }

    public function deleteUser($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->delete();

        return redirect('/admin/user')->with('status', 'Data user berhasil dihapus.');
    }
}