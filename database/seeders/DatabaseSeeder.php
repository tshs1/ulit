<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\User;
use Database\Seeders\SectionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            User::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            RolesSeeder::class,
            SectionSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
