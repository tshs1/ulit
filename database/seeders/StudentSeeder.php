<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
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
                'name'    =>'student',
                'role_id'    =>3,
                'is_male'    =>1,
                'section_id'    =>2,
                'weight'    =>75,
                'height'    =>1.75,
                'dob'    =>new \DateTime('08/15/2003'),
                'email' =>'student@gmail.com',
                'todo' =>'Underweight-Eat more meat, vegetable and do some exercise',
                'sy'    =>'2022-2023',
                'password'=>Hash::make('password'),
            ],
            [ 
                'name'    =>'studentf',
                'role_id'    =>3,
                'is_male'    =>0,
                'section_id'    =>2,
                'weight'    =>75,
                'height'    =>1.75,
                'dob'    =>new \DateTime('08/15/2003'),
                'email' =>'student2@gmail.com',
                'todo' =>'Underweight-Eat more meat, vegetable and do some exercise',
                'sy'    =>'2022-2023',
                'password'=>Hash::make('password'),
            ],
            [ 
                'name'    =>'student',
                'role_id'    =>3,
                'is_male'    =>1,
                'section_id'    =>2,
                'weight'    =>75,
                'height'    =>1.75,
                'dob'    =>new \DateTime('08/15/2003'),
                'email' =>'student3@gmail.com',
                'todo' =>'Underweight-Eat more meat, vegetable and do some exercise',
                'sy'    =>'2022-2023',
                'password'=>Hash::make('password'),
            ],
        ]);
    }
}
