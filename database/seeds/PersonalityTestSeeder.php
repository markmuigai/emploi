<?php

use App\Question;
use Illuminate\Database\Seeder;

class PersonalityTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            'I like to get on with my work without interference.',
            'I go out of my way to make contact with new people.',
            'I cannot feel relaxed unless I am certain I have made no mistakes.',
            'I am frequently spontaneous in reacting to something that has happened.',
            'I have troubles which weigh me down',
            'The way I tackle a difficult problem is immediately.',
            'It is up to people if they keep their thoughts to themselves, I still say what I think.',
            'I feel happier when supporting rather than taking the lead myself.',
            'I like to stick with my group.',
            'I try to protect people by not saying hurtful things.',
            'I do not take on more than can be done thoroughly and properly.',
            'I tend to see the worst.',
            'It often does not help to examine feelings too closely.',
            'In the end, there’s not much that bothers me.',
            'Teamwork gets the best from me.',
            'I am a fairly quiet person.',
            'I quickly get bored unless something exciting grabs my attention.',
            'I am cool under pressure.',
            'I rarely get emotional.',
            'I like to be with lots of witty, amusing people.'
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