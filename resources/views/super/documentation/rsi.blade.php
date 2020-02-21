@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'RSI Documentation')
<div class="card">
    <div class="card-body">
          <div class="dropdown">
                        <a href="#" class="btn btn-green px-3" data-toggle="dropdown">Documentation<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="index">Index</a></li>
                            <li><a href="routes">Routes</a></li>
                            <li><a href="controllers">Controllers</a></li>
                            <li><a href="views" >Views</a></li>
                            <li><a href="rsi" >RSI</a></li>
                          </ul>
                      </div>

        <div class="text-right">
            <h2>EMPLOI DOCUMENTATION</h2>
            <p>By Obare C. Brian and David Kirarit</p>

        </div>
    <h3>Role Suitability Index(RSI)</h3>

    <p>The RSI is an important <strong>tool for employers to evaluate a candidate's abilities</strong> by measuring the candidates strengths and weaknesses. It encompasess interviews, Background checks(Education Background, Employment Background),IQ Tests, Psychometric Tests, Skills check among others.</p>
    <p>To use RSI, Create an employer profile or open the dashboard. Create a job advertisement and model your ideal job seeker and rank applicants using the RSI tool.</p>
    <ul>
    	<li><b>Background-Checks</b></li>
    	<p>Protect your organization with our comprehensive employment background checks ranging:
    
    <ul>
        <div class="row pt-2">
            <div class="col-lg-6">
                <li>Identity checks</li>
                <li>Address, including previous addresses</li>
                <li>Confirmation of the right and eligibility to work in the country</li>
                <li>Verification of academic certificates, passports, and driving licenses</li>
                <li>Financial background check</li>
                <li>Qualification and membership of professional bodies</li>
                <li>Full employment history including employment gaps</li>
                <li>Detailed analysis of CVs to identify information gaps or inconsistencies and follow-up investigation of any inconsistencies</li>
                <li>Management of written reference process or questionnaire design</li>
            </div>
            <div class="col-lg-6">
                <li>In-depth interview of candidates</li>
                <li>Follow up on personal and character references</li>
                <li>Interviews with referees, including checks on the referees.</li>
                <li>Standard and enhanced criminal records check via the Criminal investigations department.</li>
                <li>Anti-fraud investigation</li>
                <li>Discreet enquiries about suspect activities</li>
                <li>Drivers Records</li>
                <li>Substance Abuse Screening</li>
            </div>
        </div>
    </ul>

        <li><b>Employment Background</b></li>

    	    	<p>
				IQ is a measure of your ability to reason and solve problems. It essentially reflects how well you did on a specific test as compared to other people of your age group. <br>
				While IQ can be a predictor of things such as innovation, experts caution that it does not necessarily guarantee success at the office. However, individuals with higher IQ levels have historically brought more meaningful change to
				organizations compared to their minors.
			   </p>
			   <p>Employers are advised to conduct IQ tests on candidates and employees to be in a better positioning when planning human resources
			  </p>

    	<li><b>Psychometric Tests</b></li>
    			<p>
				Psychometric tests help to identify a candidate’s skills, knowledge and personality.
				They’re often used during the preliminary screening stage of candidates in recruitment or even while carrying out staff capacity assessment.

				Psychometric testing can measure a number of attributes including intelligence, critical reasoning, motivation and personality profile which will guide the organization in assigning roles.
			</p>
			<p>
				They’re objective, convenient and strong indicators of job performance; making them very popular with recruiters.

				We have sharpened our knowledge in psychometrics and taken a cutting-edge approach to assessments.
			</p>
			<p>
				We work hand-in-hand with workplace psychologists and other HR consultants to offer assessments that are increasingly varied, innovative and adapted to today’s needs.
			</p>
		
    	<li><b>Proficiency-Tests</b></li>
    		 <p>Through this service you are able as employer to receive the test score for a candidate on the aptitude and proficiency tests. </p>
			 <p>You may also request for the administration of this on your own sourced candidates
			</p>
			<p>By administering proficiency tests on a candidate, the employer will be able to deeply analyze a candidate's strengths and weaknesses which may not be present in their resume.</p>
	    </ul>

	    <h3>RSI Calculation</h3>

 <p><b> //instantiatiate percentage as perc to zero</b>
    public function getRsi($post){
                $perc = 0; </p>       
                     
                       <p><b>//check if profile is complete</b>
                 if(!$this->hasCompletedProfile() || !$post->hasModelSeeker())</p>

                <p><b> //computes the percentage in education</b> level,experience,personality,company size and feedback
        $edu = $model->education_level_importance == 0 ? 0 : $model->education_level_importance / $total * 100;
        $exp = $model->experience_importance == 0 ? 0 : $model->experience_importance / $total * 100;
        $skil = $model->skills_importance == 0 ? 0 : $model->skills_importance / $total * 100;
        $pers = $model->personality_importance == 0 ? 0 : $model->personality_importance / $total * 100;
        $cosize = $model->company_size_importance == 0 ? 0 : $model->company_size_importance  / $total * 100;
        $ref = $model->feedback_importance == 0 ? 0 : $model->feedback_importance / $total * 100;</p>
   
   <p><b>//checks if the psychometric  test is more than zero</b> 
      if(count($application->psychometricTests) > 0)</p>
            {   
            	<p><b>//if applicant score is more than the set score it assigns perc+=psy</b>
                if($application->psychometricScore > $model->psychometric_test_score)
                    $perc += $psy;</p>
                 <p><b>//if applicant score is equals the set score perc will be 80% of psy</b>   
                elseif($application->psychometricScore == $model->psychometric_test_score)
                    $perc += $psy * 0.8;
                else</p>
                <p><b>//perc will be 40%of psy</b>
                    $perc += $psy * 0.4;</p>


            <p><b>//checks for accepted courses</b>
             if(count($model->modelSeekerCourses) > 0)
            {
                $found = false;
                for($i=0; $i< count($model->modelSeekerCourses); $i++)
                {
                    $courseName = $model->modelSeekerCourses[$i]->course->name;
                    if(!is_null($this->education) )
                    {
                        if( strpos($this->education, "%$courseName%") )
                            $found = true;  </p>        
   
     <p><b>If the education level is higher it multiplies perc by 50% </b>
     elseif($this->educationLevel->isSuperiorTo($model->educationLevel) )
                {
                    $perc += $edu * 0.5;
                }</p>
                <p><b>//If the education level is lower it multiplies perc by 25%</b>
                elseif($this->education_level_id == $model->education_level_id)
                {
                    $perc += $edu * 0.25;</p>
   
   <p><b>//Checks for other skills in the cv if available</b>
        if(isset($model->other_skills) && count(json_decode($model->other_skills)) > 0)
            {
                if( !is_null($this->resume_contents) )
                {
                    $other_skills = json_decode($model->other_skills);
                    $other_skills_weights = json_decode($model->other_skills_weight);</p>


        <p><b>//Checks if any referee and has provided assessment. perc will be += $total_traits/$model->traitsWeight * $pers;</b>

            if(count($this->referees) != 0) 
            {
                $assessed = array();
                for($i=0; $i<count($this->referees); $i++)
                {
                    if($this->referees[$i]->status != 'pending-details')
                        array_push($assessed, $this->referees[$i]);
                }</p>

         <p><b>//Checks for referees feedback on these parameters</b>
           if(count($this->jobApplicationReferees) > 0)
        {
            $performance = array();
            $workQuality = array();
            $targets = array();
            $rehire = array();
            $discplinary = array();</p>

         <p><b>The final value of perc</b>
                return round($perc,2);</p>
          
   <!--   <p><b>//Checks for personality, if result is zero it will return false else true</b>
	    public function hasPersonalityTrait($trait_id){
        $sql = "SELECT id FROM seeker_personality_traits WHERE seeker_id = ".$this->id." LIMIT 1";
        $result = DB::select($sql);
        if(count($result) == 0)
            return false;
        return true;
    }</p>

    <p><b>//Checks for personality trait weight</b> 
    	public function getPersonalityTraitWeight($trait_id){
        if(!$this->hasPersonalityTrait($trait_id))
            return 0;
        $sql = "SELECT weight FROM seeker_personality_traits WHERE seeker_id = ".$this->id. " AND personality_trait_id = $trait_id";
        $traitstotal = 0;
        $counter = 0;
        $results = DB::select($sql);

        for($i=0; $i<count($results); $i++ )
        {
            $counter ++;

            $traitstotal += $results[$i]->weight;
        }</p>
        <p><b>returns the total traits</b>
        if($traitstotal == 0)
            return $traitstotal;
        return $traitstotal/$counter;
    }</p> -->
    </div>

@endsection