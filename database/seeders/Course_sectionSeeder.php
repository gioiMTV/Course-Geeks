<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Course_sectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_section')->insert(
            [            
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
               
               
                
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Introduction to JavaScript',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'JavaScript Beginning',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Variables and Constants',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Program Flow',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Functions',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Objects and the DOM',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Arrays',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Scope and Hoisting',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Summary',
                    'course_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]

        );
    }
}
