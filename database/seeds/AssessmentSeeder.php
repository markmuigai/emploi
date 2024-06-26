<?php

use Illuminate\Database\Seeder;

use App\Question;

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
        $types= json_decode(file_get_contents(
            database_path('assessments.json')
        ));

        /**
         * Loop through the .json object and get each key value pair.
         * For the first level, the key is the difficulty level and the values are the questions
         */
        foreach($types as $type => $difficulty_levels){
            foreach($difficulty_levels as $difficulty_level => $questions)
            {
                // Create the questions
                foreach($questions as $question => $choices){
                    $question = Question::create([
                        'title' => $question,
                        'difficulty_level' => $difficulty_level,
                        'type' => $type
                    ]);

                    // Create the choices for each question
                    foreach($choices as $choice => $isAnswer){
                        $question->choices()->create([
                            'value' => $choice,
                            'correct_value' => $isAnswer
                        ]);
                    }
                }
            }
        }
    }
}
