<?php

use App\TestResult;
use App\Performance;
use Illuminate\Database\Seeder;

class TestResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get scores
        $results = Performance::emailsAssessed()->map(function($email){
            return [
                "type" => Performance::latestAssessment($email)->first()->getType(),
                "assessment_count" => Performance::latestAssessment($email)->first()->assessment_count,
                "email" => Performance::latestAssessment($email)->first()->email,
                "score" => round(Performance::latestAssessment($email)->pluck('correct')->avg()*100)
            ];
        });

        // Create test result record for each score
        foreach($results as $result){
            $testResult = TestResult::create([
                'email' => $result['email'],
                'type' => $result['type'],
                'assessment_count' => $result['assessment_count'],
                'score' => $result['score']
            ]);

            // Set result id foreign key in perormance records 
            foreach(Performance::latestAssessment($result['email']) as $performance){
                $performance->update([
                    'test_result_id' => $testResult->id
                ]);
            }
        }   
    }
}
