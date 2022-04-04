<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            [ 
            'name'    =>'intel',
            'teacher_id'    =>3,
            ],
            [ 
            'name'    =>'babbage',
            'teacher_id'    =>4,
            ],
            [ 
            'name'    =>'research',
            'teacher_id'    =>5,
            ],
        ]);
    }
}
