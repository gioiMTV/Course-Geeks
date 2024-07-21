<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Instructor_infoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instructor_info')->insert(
            [
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-7.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-8.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-10.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-11.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 11,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-12.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 12,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-13.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 13,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]

        );
    }
}
