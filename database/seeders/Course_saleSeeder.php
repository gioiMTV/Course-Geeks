<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Course_saleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_sale')->insert(
            [
                [
                    'course_id' => 1,
                    'student_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'student_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'student_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 4,
                    'student_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 1,
                    'student_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 5,
                    'student_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 6,
                    'student_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'student_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'course_id' => 8,
                    'student_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 1,
                    'student_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 2,
                    'student_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 3,
                    'student_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 1,
                    'student_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 6,
                    'student_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'student_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 5,
                    'student_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 8,
                    'student_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 7,
                    'student_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'course_id' => 8,
                    'student_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
