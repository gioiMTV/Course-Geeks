<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Blog_cateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_cate')->insert(
            [
                [
                    'name' => 'Courses',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Workshops',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Tutorial',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Company',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
