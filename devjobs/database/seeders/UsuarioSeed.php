<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Ramiro',
            'email'=>'correo@correo.com',
            'email_verified_at'=> Carbon::now(),
            'password'=>Hash::make('123456789'),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'=> 'Ariel',
            'email'=>'correo2@correo.com',
            'email_verified_at'=> Carbon::now(),
            'password'=>Hash::make('123456789'),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'=> 'Murua',
            'email'=>'correo3@correo.com',
            'email_verified_at'=> Carbon::now(),
            'password'=>Hash::make('123456789'),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
    }
}