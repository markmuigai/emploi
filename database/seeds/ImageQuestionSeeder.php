<?php

use App\Question;
use App\QuestionImage;
use Illuminate\Database\Seeder;

class ImageQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imgs = [
            '59', '60', '61', '62', '63', '65', '66', '68'
        ];

        foreach($imgs as $img){
            $question = Question::create([
                'title' => 'What comes next?',
                'difficulty_level' => 'medium'
            ]);
    
            // Create question image record
            $question->image()->create([
                'path' => 'public/assessments/'.$img.'.png',
                'correct_value' => 'b'
            ]);
        }
    }
}
