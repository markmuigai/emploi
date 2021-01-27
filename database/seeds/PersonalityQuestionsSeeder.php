<?php

use App\Question;
use Illuminate\Database\Seeder;

class PersonalityQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            'You enjoy vibrant social events with lots of people',
            'You often spend time exploring unrealistic yet intriguing ideas',
            'You often think about what you should have said in a conversation long after it has taken place.',
            'People can rarely upset you',
            'You often rely on other people to be the ones to start a conversation and keep it going',
            'If you have to temporarily put your plans on hold, you make sure it is your top priority to get back on track as soon as possible',
            'You are dedicated and focused on your goals, only rarely getting sidetracked',
            'Your emotions control you more than you control them',
            'You always consider how your actions might affect other people before doing something',
            'I make friends easily'
        ];

        foreach($questions as $question){
            $question = Question::create([
                'title' => $question,
                'type' => 'personality',
                'difficulty_level' => 'easy'    
            ]);
            
            $choices = ['Strongly Agree', 'Agree', 'Disagree', 'Strongly Disagree'];

            foreach($choices as $choice){
                // Create choices for each question
                $question->choices()->create([
                    'value' => $choice,
                    'correct_value' => 1
                ]);
            }
        }
    }
}
