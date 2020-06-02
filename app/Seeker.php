<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;

use App\Company;
use App\EducationLevel;
use App\Order;
use App\JobApplication;
use App\JobApplicationReferee;
use App\Post;
use App\ProductOrder;
use App\SeekerSkill;
use App\User;

use Watson\Rememberable\Rememberable;
use App\Jobs\EmailJob;
use App\Mail\CustomVacancyEmail;


class Seeker extends Model
{
    use Rememberable, Notifiable;
    public $rememberFor = 2;
    
    protected $fillable = [
        'user_id','public_name', 'gender', 'date_of_birth', 'phone_number','current_position','post_address','years_experience','industry_id','country_id','location_id','education_level_id','objective','resume','featured','education','experience','resume_contents','searching','created_at'
    ];

    public function routeNotificationForSlack($notification)
    {
        return 'https://hooks.slack.com/services/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';
    }

    public function sendWelcomeEmail(){
        $caption = "Emploi Team are glad to have you on board";
        $contents = "

        Welcome to Emploi, we're excited to have you on board. <br>
        Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace. With your account, you have access to vacancies from all across Africa. 
        <br>
        Our <a href='".url('/checkout?product=featured_seeker')."'>Featured Job Seeker Package</a> will ensure your profile stand out and employers get to see you. You'll also <a href='".url('/checkout?product=seeker_basic')."'>Get Notifications</a> on applications status change on shortlisting and reasons for rejection if it comes to that. <br>
        We have solutions tailored for your career. Our HR team is dedicated to your growth and, with our <a href='".url('/job-seekers/cv-editing')."'>CV Editing Package</a> opens your Career coaching doors and your profile is featured for 1 year, amongs't other benefits.
        <br>
        Have a look around and <a href='".url('/contact')."'>contact us</a> for support should you need it.
        <br><br>
        Update your profile and start applying for jobs. Employers are always recruiting on our platform, ensure you upload your updated resume.
        "; 
        EmailJob::dispatch($this->user->name, $this->user->email, 'Warm Welcome to Emploi', $caption, $contents);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function industry(){
        return $this->belongsTo(Industry::class,'industry_id');
    }

    public function getResumeUrlAttribute(){
        if(isset($this->resume))
            return url('/storage/resumes/'.$this->resume);
        return '#';
    }

    public static function disableFeaturedUserByUserId($user_id){
        $seeker = Seeker::where('user_id',$user_id)->first();
        if(isset($seeker->id))
        {
            $seeker->featured = 0;
            return $seeker->save();
        }
        return false;
    }

    public function testFeatured(){
        // 
    }

    public function isBeingViewedBy(User $user){
        if($this->canGetNotifications())
        {
            $jobs = [];
            if($user->role == 'admin')
            {
                $caption = "An recruiter on Emploi has viewed your profile";
                $contents = $user->name.", an Emploi Recruitor, has viewed your profile, and may consider you for positions they are recruiting internally or for clients. ";
            }
            elseif($user->role == 'employer')
            {
                $caption = "An employer on Emploi has viewed your profile";
                //employer profile
                $contents = $user->name.", an Employer, has viewed your profile, and may consider you for positions they are recruiting. ";
            }
            else
                return false;

            

            $opportunities = false;
            $messages = [];

            if($this->featured == 0)
            {
                $opportunities = true;
                $messages[] = "Get featured on Emploi. Let your name be seen by ranking higher in applications and searches."; 
                
            }
            if(!$this->resume)
            {
                $opportunities = true;
                $messages[] = "<b style='color: red'>You have not attached a Resume!</b> Without a resume, recruiters and employers disregard your profile. Your profile will also be harder to find and your Role Suitability Score for applications you make is affected negatively."; 
                
            }
            else
            {
                $days_since = Carbon::parse($this->updated_at)->diff(Carbon::now())->days;
                if($days_since > 30)
                {
                    $opportunities = true;
                    $messages[] = "<b>You have an old Resume!</b> Your Resume was uploaded $days_since ago, and it is important to update it. Include new achievements and check if outdated information is present."; 
                }
            }
            if(!$this->age)
            {
                $opportunities = true;
                $messages[] = "You have not indicated your age on Emploi. This is crucial as HR personnel are keen on age when hiring."; 
                
            }
            elseif($this->age && $this->age < 18)
            {
                $opportunities = true;
                $messages[] = "The age you indicated is below 18. Kindly ensure this is correct as it may reduce your hireability."; 
            }
            if(!$this->phone_number)
            {
                $opportunities = true;
                $messages[] = "You have not indicated a valid phone number on your profile. Include this so you can be reached easily."; 
                
            }
            if(!$this->years_experience)
            {
                $opportunities = true;
                $messages[] = "You have not indicated your total experience duration. Recruiters are in a rush and want to assess you quickly."; 
                
            }

            if(!$this->location_id)
            {
                $opportunities = true;
                $messages[] = "Your current location is not indicated on your profile."; 
                
            }

            if(!$this->searching != 1)
            {
                $opportunities = true;
                $messages[] = "Your <b>profile indicates you are not looking for a job</b>, change this setting to searching to be considered for positions."; 
                
            }
            
            if($opportunities)
            {
                $contents .= "<br>We have some suggestions that may increase your hireability: <ol>";
                for($i=0; $i<count($messages); $i++)
                    $contents .= "<li>".$messages[$i]."</li>";
                $contents .= "</ol>";
            }

            $contents .= "<br> We offer <a href='".url('/job-seekers/cv-editing')."'>Professional CV Editing Services</a> which comes with career coaching and interview preparation which are essential when looking for work.";
            
            //return $contents;



            //shortlisting jobs, focus on applied
            
            
            EmailJob::dispatch($this->user->name, $this->user->email, 'Profile Viewed', $caption, $contents);
        }
    }

    public function canGetNotifications(){
        if($this->featured == 1)
            return true;
        $orders = $this->user->orders;
        for($i=0; $i<count($orders); $i++)
        {
            for($k=0; $k<count($orders[$i]->productOrders); $k++)
            {
                $productOrder = $orders[$i]->productOrders[$k];
                if($productOrder->product->slug == 'seeker_basic' && $productOrder->contents != null && $productOrder->contents != 'completed')
                    return true;
            }
        }
        return false;
    }

    public function educationLevel(){
        return $this->belongsTo(EducationLevel::class,'education_level_id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }

    public function cvrequests(){
        return $this->hasMany(CvRequest::class);
    }

    public function getSexAttribute(){
        if($this->gender == 'M')
            return 'Male';
        if($this->gender == 'F')
            return 'Female';
        return 'Other';
    }

    public static function isJson($string){
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }


    public function experience(){
        return $this->experience == null ? [] : json_decode($this->experience);
    }

    public function education(){
        return $this->education == null ? [] : json_decode($this->education);
    }

    public function hasApplied($post){
        $j = JobApplication::where('user_id',$this->user->id)
                ->where('post_id',$post->id)->first();
        if(isset($j->id))
            return true;
        return false;
    }

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    public function seekerPersonalityTraits(){
        return $this->hasMany(SeekerPersonalityTrait::class);
    }

    public function seekerIndustrySkills(){
        return $this->hasMany(SeekerIndustrySkill::class);
    }

    public function otherSeekerSkills(){
        return $this->hasMany(OtherSeekerSkill::class);
    }

    public function matchSeeker($user){
        //return 'asa';
        if($user->role == 'employer' || $user->role == 'admin')
        {
            $c = Company::where('user_id',$user->id)->first();
            if(isset($c->id))
            {
                $posts = Post::where('company_id',$c->id)->orderBy('title')->get();
                $ret = [];
                foreach($posts as $p)
                {
                    if(!$this->hasApplied($p))
                        array_push($ret, $p);
                }
                return $ret;
            }
        }
        return [];

    }

    public function getAgeAttribute(){
        if($this->date_of_birth != null)
            return Carbon::parse($this->attributes['date_of_birth'])->age;
        return false;
    }


    public function getRsi($post){
        //return $this->getPlainRsi($post);
        $perc = 0;

        if(!$this->hasCompletedProfile() || !$post->hasModelSeeker())
            return $perc;
        $model = $post->modelSeeker;

        $total = 
            $model->education_level_importance + 
            $model->experience_importance + 
            $model->skills_importance + 
            $model->personality_importance + 
            $model->interview_importance + 
            $model->psychometric_importance +  
            $model->company_size_importance +
            $model->feedback_importance;



        $application = JobApplication::where('user_id',$this->user->id)
                    ->where('post_id',$post->id)
                    ->first();

        if($model->interview)
        {
            
            $interview = $model->interview_importance == 0 ? 0 : $model->interview_importance / $total * 100;
        }
        else
        {
            $total -= $model->interview_importance;
            $interview = 0;
        }
            
        if($model->psychometric)
        {
            
            $psy = $model->psychometric_importance == 0 ? 0 : $model->psychometric_importance / $total * 100;
        }
        else
        {
            $total -= $model->psychometric_importance;
            $psy = 0;
        }
            

        

        $edu = $model->education_level_importance == 0 ? 0 : $model->education_level_importance / $total * 100;
        $exp = $model->experience_importance == 0 ? 0 : $model->experience_importance / $total * 100;
        $skil = $model->skills_importance == 0 ? 0 : $model->skills_importance / $total * 100;
        $pers = $model->personality_importance == 0 ? 0 : $model->personality_importance / $total * 100;
        $cosize = $model->company_size_importance == 0 ? 0 : $model->company_size_importance  / $total * 100;
        $ref = $model->feedback_importance == 0 ? 0 : $model->feedback_importance / $total * 100;


        if(isset($application->id)) //psychometric
        {
            if(count($application->psychometricTests) > 0)
            {
                if($application->psychometricScore > $model->psychometric_test_score)
                    $perc += $psy;
                elseif($application->psychometricScore == $model->psychometric_test_score)
                    $perc += $psy * 0.8;
                else
                    $perc += $psy * 0.4;
            }
            else
            {
                //$perc += $psy;
            }
        }

        if(isset($application->id))//interview
        {
            if(count($application->interviewResults) > 0)
            {
                if($application->interviewScore > $model->interview_result_score)
                    $perc += $interview;
                elseif($application->interviewScore == $model->interview_result_score)
                    $perc += $interview * 0.8;
                else
                    $perc += $interview * 0.4;
            }
            else
            {
                //$perc += $interview;
            }
        }

        //education
        if(isset($this->industry_id) && $this->industry_id == $model->post->industry_id) 
        {
            //accepted courses
            if(count($model->modelSeekerCourses) > 0)
            {
                $found = false;
                for($i=0; $i< count($model->modelSeekerCourses); $i++)
                {
                    $courseName = $model->modelSeekerCourses[$i]->course->name;
                    if(!is_null($this->education) )
                    {
                        if( strpos($this->education, "%$courseName%") )
                            $found = true;                        
                    }

                    if(!is_null($this->resume_contents) )
                    {
                        if( strpos($this->resume_contents, "%$courseName%") )
                            $found = true;                        
                    }
                    if($found)
                        break;
                }

                if($found)
                {
                    $perc += $edu;
                }
                elseif($this->educationLevel->isSuperiorTo($model->educationLevel) )
                {
                    $perc += $edu * 0.5;
                }
                elseif($this->education_level_id == $model->education_level_id)
                {
                    $perc += $edu * 0.25;
                }
                
            }

        }

        if($this->industry_id == $model->post->industry_id)//experience
        {
            if($this->years_experience == $model->experience_duration)
                $perc += $exp * 0.8;
            elseif($this->years_experience < $model->experience_duration)
            {
                if($model->experience_duration/2 >= $this->years_experience)
                    $perc += $exp * 0.2;
                else
                    $perc += $exp * 0.4;
            }
            else
                $perc += $exp;
        }

        if(count($model->modelSeekerSkills) > 0 || $model->other_skills != null && count(json_decode($model->other_skills)) > 0) //skills
        {

            $skills_count = $model->skillsWeight;
            $exist_skills = 0;

            if(count($model->modelSeekerSkills) > 0)
            {
                for($i=0; $i<count($model->modelSeekerSkills); $i++)
                {
                    if($this->hasSkill($model->modelSeekerSkills[$i]->industrySkill->id))
                        $exist_skills += $model->modelSeekerSkills[$i]->weight;
                }
            }

            if(isset($model->other_skills) && count(json_decode($model->other_skills)) > 0)
            {
                if( !is_null($this->resume_contents) )
                {
                    $other_skills = json_decode($model->other_skills);
                    $other_skills_weights = json_decode($model->other_skills_weight);

                    for($i=0; $i<count($other_skills); $i++)
                    {
                        if(strpos($this->resume_contents, "%".$other_skills[$i]."%"))
                        {
                            $exist_skills += $other_skills_weights[$i];
                        }
                    }
                }
            }
            if($skills_count != 0)
                $perc+= $skil * $exist_skills / $skills_count;
            
        }
        else
        {
            //$perc += $skil;
        }

        if( $model->traitsWeight != 0 ) //personality
        {

            $total_traits = 0;

            if(count($this->referees) != 0) //personality traits
            {
                $assessed = array();
                for($i=0; $i<count($this->referees); $i++)
                {
                    if($this->referees[$i]->status != 'pending-details')
                        array_push($assessed, $this->referees[$i]);
                }


                if(count($assessed) > 0)
                {
                    for($i=0; $i<count($model->modelSeekerPersonalityTraits); $i++)
                    {
                        $total_traits += $this->getPersonalityTraitWeight($model->modelSeekerPersonalityTraits[$i]->personality_trait_id);
                        
                    }

                    $perc += $total_traits/$model->traitsWeight * $pers;
                }
                else
                {

                    //$perc += $pers;
                }

            }
            else
            {
                //$perc += $pers;
            }

        }
        else
        {
            //$perc += $pers;
        }

        //previous company size
        $user_id = $this->user->id;
        $post_id = $post->id;
        $model_co_size = $model->company_size_id;

        $sql = "SELECT id FROM job_applications WHERE user_id=$user_id AND post_id=$post_id LIMIT 1";
        $results = DB::select($sql);
        if(count($results) == 1)
        {
            $application_id = $results[0]->id;
            $sql = "SELECT company_size_id FROM seeker_previous_company_sizes WHERE job_application_id = $application_id AND company_size_id = $model_co_size LIMIT 1";

            $results = DB::select($sql);
            if(count($results) > 0)
                $perc += $cosize;
        }

        
        
        
        //referee feedback 
        if(count($this->jobApplicationReferees) > 0)
        {
            $performance = array();
            $workQuality = array();
            $targets = array();
            $rehire = array();
            $discplinary = array();

            for($i=0; $i<count($this->jobApplicationReferees); $i++)
            {
                $rf = $this->jobApplicationReferees[$i];
                
                    array_push($discplinary, $rf->discplinary_cases);
                    array_push($rehire, $rf->would_you_rehire);
            }

            for($i=0; $i<count($this->seekerJobs); $i++)
            {
                if($this->seekerJobs[$i]->referee->status != 'ready')
                    continue;
                $sj = $this->seekerJobs[$i];
                array_push($performance, $sj->work_performance);                
                array_push($workQuality, $sj->work_quality);
                array_push($targets, $sj->meeting_targets);
            }
            $performance = count($performance) > 0 ? array_sum($performance ) / count($performance) : 0;
            $workQuality = count($workQuality) > 0 ? array_sum($workQuality ) / count($workQuality) : 0;
            $targets = count($targets) > 0 ? array_sum($targets ) / count($targets) : 0;

            //$perc += $ref;

            //would you rehire
            $hire = true;
            //$nohire = false;
            for($i=0; $i<count($rehire);$i++)
            {
                if($rehire[$i] == 'no' || $rehire[$i] == 'maybe')
                    $hire = false;
                // if($rehire[$i] == 'maybe')
                //     $nohire = true;
            }
            if(!$hire)
                $perc = $perc * 0.7;
            // elseif($nohire)
            //     $perc = $perc * 0.85;

            //performance
            if($performance >= 90)
                $perc = $perc * 1.25;
            elseif($performance>=75)
                $perc = $perc * 1;
            elseif($performance>=60)
                $perc = $perc * 0.75;
            elseif($performance>=50)
                $perc = $perc * 0.5;
            elseif($performance>=30)
                $perc = $perc * 0.25;
            else
                $perc = $perc * 0.1;


            //work quality
            if($workQuality >= 90)
                $perc = $perc * 1.25;
            elseif($workQuality>=75)
                $perc = $perc * 1;
            elseif($workQuality>=60)
                $perc = $perc * 0.75;
            elseif($workQuality>=50)
                $perc = $perc * 0.5;
            elseif($workQuality>=30)
                $perc = $perc * 0.25;
            else
                $perc = $perc * 0.1;

            //ability to meet targets

            if($targets >= 90)
                $perc = $perc * 1.25;
            elseif($targets>=75)
                $perc = $perc * 1;
            elseif($targets>=60)
                $perc = $perc * 0.75;
            elseif($targets>=50)
                $perc = $perc * 0.5;
            elseif($targets>=30)
                $perc = $perc * 0.25;
            else
                $perc = $perc * 0.1;

            //discplinary cases
            $gross = false;
            $mod = false;
            $minor = false;
            for($i=0; $i<count($discplinary);$i++)
            {
                if($discplinary[$i] == 'some')
                    $mod = true;
                if($discplinary[$i] == 'many')
                    $gross = true;
                if($discplinary[$i] == 'minor')
                    $minor = true;
            }
            if($gross)
                $perc = $perc * 0.5;
            elseif($mod)
                $perc = $perc * 0.85;
            elseif($minor)
                $perc = $perc * 0.95;

            
        }

        

        

        return round($perc,2);
    }

    public function hasPersonalityTrait($trait_id){
        $sql = "SELECT id FROM seeker_personality_traits WHERE seeker_id = ".$this->id." LIMIT 1";
        $result = DB::select($sql);
        if(count($result) == 0)
            return false;
        return true;
    }

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
        }
        if($traitstotal == 0)
            return $traitstotal;
        return $traitstotal/$counter;
    }

    public function hasCompletedProfile(){
        // if( is_null($this->date_of_birth) )
        //     return false;
        // if( is_null($this->years_experience) )
        //     return false;
        // if( is_null($this->location_id) )
        //     return false;
        if( is_null($this->education_level_id) )
            return false;
        if( is_null($this->resume) )
            return false;
        // if( is_null($this->education) )
        //     return false;
        // if( is_null($this->experience) )
        //     return false;
        return true;
    }

    public function skills(){
        return $this->hasMany(SeekerSkill::class);
    }

    public function hasSkill($skill_id){
        for($i=0; $i<count($this->skills); $i++)
        {
            if($this->skills[$i]->skill->id == $skill_id)
                return true;
        }
        return false;
    }

    public function featuredPosts(){
        //where('industry_id',$this->industry_id)
                   // ->
        return Post::where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->where('industry_id',$this->industry_id)
                    ->where('status','active')
                    ->get();
    }

    public function sendVacancyEmail($channel)     

    {
        if(User::subscriptionStatus($this->user->email))
        $vacancies = Post::where('created_at', '>', Carbon::now()->subDays(1))
                    ->where('industry_id',$this->user->seeker->industry_id)
                    ->where('status','active')
                    ->orderBy('created_at','DESC')
                    ->get();
        $featured = Post::where('created_at', '>', Carbon::now()->subDays(1))
                    ->where('featured','true')
                    ->where('status','active')
                    ->orderBy('created_at','DESC')
                    ->get();

                {
    
               if ( !empty($vacancies || $featured)) {  
                $caption = "Emploi.co is a smart recruitment engine leveraging data and technology to create instant, accurate matches between candidates and roles.";
                $contents = "Here are the Latest Vacancies in <b>".$this->user->seeker->industry->name.",</b> Apply Now.<br><br>";
                                  
                                  foreach ($vacancies as $v) {
                      $contents .= "<ul";              
                      $contents .= "<li><a href='".url('/vacancies/'.$v->slug)."'>$v->slug.</a><li><br>";
                      $contents .= "</ul>";
                               }
               
                             foreach ($featured as $f) {
                $content .= "<br><a href='".url('/vacancies/'.$f->slug)."'>$v->slug.</a><br>";
                $content .= "<h4>".$f->company->name."</h4>";
                $content .= "<p>Location:".$f->location->name."<p>";
                $content .= "<p>Posted:".$f->since."<p><br>";
                 }
                       
                             
                $content .= "Click <a href='".url('/vacancies')."'>vacancies</a> for more and how to apply.<br>";         
                $content .= "<a href='".url('/job-seekers/cv-editing')."'>Request CV Editing</a><br>";                                                                     
                     
                EmailJob::dispatch($this->user->name, $this->user->email, 'Trending Job Vacancies', $caption, $contents, $content);
                return true;
           
                
           }
       }
    }
        
         
          


    public function referees(){
        return $this->hasMany(Referee::class);
    }

    public function jobApplicationReferees(){
        return $this->hasMany(JobApplicationReferee::class);
    }

    public function savedProfiles(){
        return $this->hasMany(SavedProfile::class);
    }

    public function seekerJobs(){
        return $this->hasMany(SeekerJob::class);
    }

}
