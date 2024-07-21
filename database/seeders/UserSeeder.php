<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder  extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'admin',
                    'email' => 'admin@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('123'),
                    'role' => 2,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 0,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 0,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 0,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 0,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 0,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 0,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 1,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 1,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 1,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 1,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 1,
                    'created_at' => now(),

                ],
                [
                    'username' => Str::random(10),
                    'email' => Str::random(10) . '@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 1,
                    'created_at' => now(),

                ],
            ]
        );
    }
}
