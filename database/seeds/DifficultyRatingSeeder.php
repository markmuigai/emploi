<?php

use App\Industry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultyRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {

            // Get the data from the included
            // .json file
            $industries= json_decode(file_get_contents(
                database_path('difficulty_rating.json')
            ));

            /**
             * Loop through the .json object and get each key value pair.
             */

            foreach($industries as $industry_slug => $difficulty_level)
            {
                // Get industry
                $ind = Industry::where('slug', $industry_slug)->firstOrFail();

                // Assign difficulty rating
                $ind->difficultyLevel()->create([
                    'difficulty_level' => $difficulty_level
                ]);
            }
        });
    }
}
