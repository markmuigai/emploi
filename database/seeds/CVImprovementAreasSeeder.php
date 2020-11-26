<?php

use App\CVImprovementArea;
use Illuminate\Database\Seeder;

class CVImprovementAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $improvements = [
            'Expound more on the roles you were performing and highlight achievements',
            'A lot of editing and re-arrangement needed to give it a better flow',
            'Lack of Key words - this is important and usually the 1st thing a recruiter looks at just at a glance without even going to the work experience',
            'Too shallow. Lack of career punch. This will give the recruiter a reason to shortlist you and find more details due to an interesting cv.',
            'Lacks a clear Career summary  which should be short and precise',
            'Your CV needs a more professional and appealing outlay',
        ];

        foreach($improvements as $imp){
            CVImprovementArea::create([
                'name' => $imp
            ]);
        }
    }
}
