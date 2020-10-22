<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserPermissionSeeder::class,
            UserSeeder::class,
            RawDataSeeder::class,
            BlogSeeder::class,
            CompanySeeder::class,
            EmployerSeeder::class,
            JobsSeeder::class,
            FaqSeeder::class,
            JobApplicationSeeder::class,
            JobsSeeder::class,
            PostGroupJobSeeder::class,
            PostSeeder::class,
            SeekerSeeder::class,
            AssessmentSeeder::class
        ]);
    }
}
