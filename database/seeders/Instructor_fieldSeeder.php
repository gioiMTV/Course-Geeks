<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Instructor_fieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instructor_field')->insert(
            [
                [
                    'instructor_preview_id' => 1,
                    'name' => 'Designer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 1,
                    'name' => 'Teacher',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 1,
                    'name' => 'Front-end Developer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 2,
                    'name' => 'Front-end Developer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 2,
                    'name' => 'Teacher',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 2,
                    'name' => 'Designer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 3,
                    'name' => 'Teacher',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 3,
                    'name' => 'Back-end Developer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 4,
                    'name' => 'Front-end Developer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 4,
                    'name' => 'Teacher',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

                [
                    'instructor_preview_id' => 4,
                    'name' => 'Back-end Developer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 5,
                    'name' => 'Frontend Engineer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 6,
                    'name' => 'Designer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 6,
                    'name' => 'Software Engineer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 1,
                    'name' => 'UI/UX Designer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 5,
                    'name' => 'Teacher',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 4,
                    'name' => 'BA',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 6,
                    'name' => 'Back-end Developer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'instructor_preview_id' => 5,
                    'name' => 'Front-end Developer',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
