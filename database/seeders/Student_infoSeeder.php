<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class Student_infoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_info')->insert(

            [
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-1.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-2.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-3.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-4.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-5.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'avatar' => 'avatar-6.jpg',
                    'phone' => Faker::create()->phoneNumber,
                    'birthday' => now(),
                    'address' => Str::random(10),
                    'user_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]

        );
    }
}
