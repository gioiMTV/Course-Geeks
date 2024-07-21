<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            Instructor_infoSeeder::class, 
            Student_infoSeeder::class, 
            Instructor_previewSeeder::class,
            Instructor_fieldSeeder::class, 
            SocialSeeder::class, 
            Course_cateSeeder::class, 
            CourseSeeder::class,
            Course_sectionSeeder::class,
            Course_lectureSeeder::class,
            Course_saleSeeder::class,
            Course_reviewSeeder::class,
            RequirementSeeder::class,
            Blog_cateSeeder::class,
            BlogSeeder::class,
        ]);
    }
}

 
