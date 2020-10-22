<?php

use Illuminate\Database\Seeder;

class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get the data from the included
        // .json file
        $difficlty_levels= json_decode(file_get_contents(
            database_path('assessments.json')
        ));

        /**
         * Loop through the .json object and get each key value pair.
         * For the first level, the key is the difficulty level and the values are the questions
         * permissions.
         */
        foreach($difficulty_levels as $difficulty_level => $questions)
        {
            // Create the questions
            foreach($questions as $question => $choices){
                $question = Question::create([
                    'title' => $question,
                    'difficulty_level' => $difficlty_level
                ]);

                // Create the choices for each question
                foreach($choices as $choice => $isAnswer){
                    $question->choices()->create([
                        'choice' => $choice,
                        'isAnswer' => $isAnswer
                    ]);
                }
            }
        }
    }
}
