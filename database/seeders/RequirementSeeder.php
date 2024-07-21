<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('requirement')->insert(
            [
                [
                    'name' => 'Bootstrap',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Javascript',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'CSS',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'HTML',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'C',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'C++',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Java',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Python',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Bootstrap',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
