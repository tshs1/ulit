<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            [ 
            'name'    =>'channey',
            'role_id'    =>1,
            'email' =>'superadmin@gmail.com',
            'weight' =>46,
            'height' =>66,
            'password'=>Hash::make('password'),
            ],
        ]);
    }
}
