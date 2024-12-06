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
            'email'=>'admin@gmail.com',
            'role'=>'admin',
            'password'=>Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'name' => 'Akun Kontributor',
            'username' => 'kontributor',
            'email'=>'kontributor@gmail.com',
            'role'=>'kontributor',
            'password'=>Hash::make('123456')
        ]);
    }
}
