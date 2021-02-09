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
            FaqSeeder::class,
            JobApplicationSeeder::class,
            PostGroupSeeder::class,
            PostGroupJobSeeder::class,
            PostSeeder::class,
            SeekerSeeder::class,
            AssessmentSeeder::class,
            DifficultyRatingSeeder::class,
            RefereeSeeder::class,
            JobApplicationRefereeSeeder::class,
            SeekerJobSeeder::class,
            CVKeywordSeeder::class,
            CVImprovementAreasSeeder::class,
            EvaluationCriteriaSeeder::class,
            PersonalityTestSeeder::class,
            ImageQuestionSeeder::class,
            ProductsSeeder::class
        ]);
    }
}
