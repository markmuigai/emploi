<?php

use App\EvaluationCriteria;
use Illuminate\Database\Seeder;

class EvaluationCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evaluationCriteria = [
            [
                'category' => 'Educational Background',
                'title'=> 'Does the candidate have the appropriate educational qualifications or training for this position?'
            ],
            [
                'category' => 'Prior Work Experience',
                'title'=> 'Has the candidate acquired similar skills or qualifications through past work experiences?'
            ],
            [
                'category' => 'Technical Qualifiations/Experience',
                'title'=> 'Does the candidate have the technical skills necessary for this position?'
            ],
            [
                'category' => 'Verbal Communication',
                'title'=> "How were the candidate's communication skills during the interview?"
            ],
            [
                'category' => 'Candidate Interest',
                'title'=> 'How much interest did the candidate show in the position and the organization?'
            ],
            [
                'category' => 'Knowledge of Organization',
                'title'=> 'Did the candidate research the orgainzation prior to the interview?'
            ],
            [
                'category' => 'Team Building/Interpersonal skills',
                'title'=> 'Did the candidate demonstrate, through their answers, good teambuilding/interpersonal skills?'
            ],
            [
                'category' => 'Initiative',
                'title'=> 'Did the candidate demonstrate, through their answers, a high degree of initiative?'
            ],
            [
                'category' => 'Time Management',
                'title'=> 'Did the candidate demonstrate, through their answers, good time management skills?'
            ],
            [
                'category' => 'Customer Service',
                'title'=> 'Did the candidate demonstrate, through their answers, a high level of customer service skills/abilities?'
            ],
            [
                'category' => 'Overall Impression and Recommendation',
                'title'=> "Summary of your perceptions of the candidate's strengths/weaknesses. Final comments and recommendations for proceeding with the candidate"
            ],
        ];

        foreach($evaluationCriteria as $criteria){
            EvaluationCriteria::create([
                'category' => $criteria['category'],
                'title' => $criteria['title']
            ]);
        }
    }
}
