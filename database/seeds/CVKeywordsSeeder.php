<?php

use App\CVKeyword;
use Illuminate\Database\Seeder;

class CVKeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cv keywords
        $keywords = [
            'personal information',
            'skills',
            'education',
            'responsibilities',
            'achievements',
            'experience',
            'training'
        ];

        // Store in DB
        foreach($keywords as $keyword){
            CVKeyword::create([
                'name' => $keyword
            ]);
        }
    }
}
