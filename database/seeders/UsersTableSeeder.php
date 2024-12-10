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
            'role'=>'admin',
            'password'=>Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Akun Kontributor',
            'username' => 'kontributor',
            'email'=>'kontributor@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('123456')
        ]);
        DB::table('users')->insert([
            'name' => 'Sekda Labura',
            'username' => 'monevsekda',
            'email'=>'monevsekda@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev01')
        ]);
        DB::table('users')->insert([
            'name' => 'Bappeda Labura',
            'username' => 'monevbappeda',
            'email'=>'monevbappeda@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev02')
        ]);
        DB::table('users')->insert([
            'name' => 'Distan Labura',
            'username' => 'monevdistan',
            'email'=>'monevdistan@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev03')
        ]);
        DB::table('users')->insert([
            'name' => 'Diskominfo Labura',
            'username' => 'monevdiskominfo',
            'email'=>'monevdiskominfo@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev04')
        ]);
        DB::table('users')->insert([
            'name' => 'DLH Labura',
            'username' => 'monevdlh',
            'email'=>'monevdlh@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev05')
        ]);
        DB::table('users')->insert([
            'name' => 'Dispedag Labura',
            'username' => 'monevdisperdag',
            'email'=>'monevdisperdag@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev06')
        ]);
        DB::table('users')->insert([
            'name' => 'Balitbangda Labura',
            'username' => 'monevbalitbangda',
            'email'=>'monevbalitbangda@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev07')
        ]);
        DB::table('users')->insert([
            'name' => 'BPBD Labura',
            'username' => 'monevbpbd',
            'email'=>'monevbpbd@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev08')
        ]);
        DB::table('users')->insert([
            'name' => 'BPS Labura',
            'username' => 'monevbps',
            'email'=>'monevbps@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev09')
        ]);
        DB::table('users')->insert([
            'name' => 'Damkar Labura',
            'username' => 'monevdamkar',
            'email'=>'monevdamkar@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev10')
        ]);
        DB::table('users')->insert([
            'name' => 'DKP Labura',
            'username' => 'monevdkp',
            'email'=>'monevdkp@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev11')
        ]);
        DB::table('users')->insert([
            'name' => 'PUPR Labura',
            'username' => 'monevpupr',
            'email'=>'monevpupr@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev12')
        ]);
        DB::table('users')->insert([
            'name' => 'Perkim Labura',
            'username' => 'monevperkim',
            'email'=>'monevperkim@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev13')
        ]);
        DB::table('users')->insert([
            'name' => 'KPH Aek Kanopan',
            'username' => 'monevkph5',
            'email'=>'monevkph5@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev14')
        ]);
        DB::table('users')->insert([
            'name' => 'KPH Kisaran',
            'username' => 'monevkph3',
            'email'=>'monevkph3@mail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('Monev15')
        ]);
    }
}
