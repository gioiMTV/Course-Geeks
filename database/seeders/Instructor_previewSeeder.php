<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Instructor_previewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instructor_preview')->insert(
            [
                [
                    'instructor_id' => 1,
                    'description' => 'I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies like AI, voice control, and augmented reality will change our interfaces.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'instructor_id' => 2,
                    'description' => 'I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies like AI, voice control, and augmented reality will change our interfaces.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'instructor_id' => 3,
                    'description' => 'I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies like AI, voice control, and augmented reality will change our interfaces.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'instructor_id' => 4,
                    'description' => 'I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies like AI, voice control, and augmented reality will change our interfaces.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'instructor_id' => 5,
                    'description' => 'I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies like AI, voice control, and augmented reality will change our interfaces.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'instructor_id' => 6,
                    'description' => 'I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies like AI, voice control, and augmented reality will change our interfaces.',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
