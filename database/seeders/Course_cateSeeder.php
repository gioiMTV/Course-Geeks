<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Course_cateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_cate')->insert(
            [
                [
                    'name' => 'Web Development',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Design',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Mobile App',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'IT Software',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Marketing',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
            ]
        );
    }
}
