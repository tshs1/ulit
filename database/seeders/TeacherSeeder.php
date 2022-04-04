<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
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
                'id' =>3,
                'name'    =>'teacher',
                'advisory_id'    =>1,
                'role_id'    =>2,
                'email' =>'teacher1@gmail.com',
                'password'=>Hash::make('password'),
                ],
                [ 
                'id' =>4,
                'name'    =>'berlin ramos',
                'advisory_id'    =>2,
                'role_id'    =>2,
                'email' =>'berlin@gmail.com',
                'password'=>Hash::make('password'),
                ],
                [ 
                'id' =>5,
                'name'    =>'anthony',
                'advisory_id'    =>3,
                'role_id'    =>2,
                'email' =>'anthony@gmail.com',
                'password'=>Hash::make('password'),
                ],
        ]);
    }
}
