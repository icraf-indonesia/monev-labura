<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Akun Admin',
            'username' => 'admin',
            'email'=>'admin@mail.com',
            'id_instansi' => 99,
            'role'=>'admin',
            'password'=>Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Akun Kontributor',
            'username' => 'kontributor',
            'email'=>'kontributor@mail.com',
            'id_instansi' => 99,
            'role'=>'kontributor',
            'password'=>Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Sekda Labura',
            'username' => 'monevsekda',
            'email'=>'monevsekda@mail.com',
            'id_instansi' => 99,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev01')
        ]);
        DB::table('users')->insert([
            'name' => 'Bappeda Labura',
            'username' => 'monevbappeda',
            'email'=>'monevbappeda@mail.com',
            'id_instansi' => 1,
            'role'=>'admin',
            'password'=>Hash::make('Monev02')
        ]);
        DB::table('users')->insert([
            'name' => 'Distan Labura',
            'username' => 'monevdistan',
            'email'=>'monevdistan@mail.com',
            'id_instansi' => 10,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev03')
        ]);
        DB::table('users')->insert([
            'name' => 'Diskominfo Labura',
            'username' => 'monevdiskominfo',
            'email'=>'monevdiskominfo@mail.com',
            'id_instansi' => 5,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev04')
        ]);
        DB::table('users')->insert([
            'name' => 'DLH Labura',
            'username' => 'monevdlh',
            'email'=>'monevdlh@mail.com',
            'id_instansi' => 6,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev05')
        ]);
        DB::table('users')->insert([
            'name' => 'Disperdag Labura',
            'username' => 'monevdisperdag',
            'email'=>'monevdisperdag@mail.com',
            'id_instansi' => 9,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev06')
        ]);
        DB::table('users')->insert([
            'name' => 'Balitbangda Labura',
            'username' => 'monevbalitbangda',
            'email'=>'monevbalitbangda@mail.com',
            'id_instansi' => 1,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev07')
        ]);
        DB::table('users')->insert([
            'name' => 'BPBD Labura',
            'username' => 'monevbpbd',
            'email'=>'monevbpbd@mail.com',
            'id_instansi' => 2,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev08')
        ]);
        DB::table('users')->insert([
            'name' => 'BPS Labura',
            'username' => 'monevbps',
            'email'=>'monevbps@mail.com',
            'id_instansi' => 3,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev09')
        ]);
        DB::table('users')->insert([
            'name' => 'Damkar Labura',
            'username' => 'monevdamkar',
            'email'=>'monevdamkar@mail.com',
            'id_instansi' => 8,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev10')
        ]);
        DB::table('users')->insert([
            'name' => 'DKP Labura',
            'username' => 'monevdkp',
            'email'=>'monevdkp@mail.com',
            'id_instansi' => 4,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev11')
        ]);
        DB::table('users')->insert([
            'name' => 'PUPR Labura',
            'username' => 'monevpupr',
            'email'=>'monevpupr@mail.com',
            'id_instansi' => 7,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev12')
        ]);
        DB::table('users')->insert([
            'name' => 'Perkim Labura',
            'username' => 'monevperkim',
            'email'=>'monevperkim@mail.com',
            'id_instansi' => 11,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev13')
        ]);
        DB::table('users')->insert([
            'name' => 'KPH Aek Kanopan',
            'username' => 'monevkph5',
            'email'=>'monevkph5@mail.com',
            'id_instansi' => 13,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev14')
        ]);
        DB::table('users')->insert([
            'name' => 'KPH Kisaran',
            'username' => 'monevkph3',
            'email'=>'monevkph3@mail.com',
            'id_instansi' => 13,
            'role'=>'kontributor',
            'password'=>Hash::make('Monev15')
        ]);
    }
}
