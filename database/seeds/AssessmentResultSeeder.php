<?php

use App\Question;
use App\Performance;
use Illuminate\Database\Seeder;

class AssessmentResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initalize emails collection
        $emails = collect();

        // Factory to generate 30 emails
        for($i=0; $i < 15; $i++){
            // Generate email
            $email = Faker\Factory::create()->safeEmail;

            // Add email to emails array
            $emails->push($email);
        }

        // dd($emails);

        // Create assessments for each emails
        foreach($emails as $email){
            for($i=0; $i < 10; $i++){
                $question = Question::whereDoesntHave('image')->get()->random();
                $performance = Performance::create([
                    'user_id' => null,
                    'assessment_count' => 1,
                    'email' => $email,           
                    'question_id' => $question->id,
                    'choice_id' => $question->choices->random()->id,
                    'correct' => 0
                ]);
            }
        }

    }
}
