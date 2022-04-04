<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
            'name'    =>'dev',
            'display_name' =>'Super Admin',
            ],
            [
            'name'    =>'admin',
            'display_name' =>'teacher', 
            ],
            [
            'name'    =>'user',
            'display_name' =>'Student', 
            ]
        ]);
    }
}
