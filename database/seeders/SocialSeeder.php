<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social')->insert(
            [
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 4,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 7,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 9,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 11,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 11,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 12,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 12,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Facebook',
                    'url' => 'https://www.facebook.com/hazakinoii',
                    'user_id' => 13,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/channel/UCoVu8viuyzWvl7Oat-tF-bg',
                    'user_id' => 13,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
