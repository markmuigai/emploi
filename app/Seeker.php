<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;


use App\Company;
use App\EducationLevel;
use App\Order;
use App\JobApplication;
use App\JobApplicationReferee;
use App\Post;
use App\ProductOrder;
use App\SeekerSkill;
use App\User;
use App\Blog;
use App\SeekerSubscription;
use App\Task;
use App\PartTimer;
use App\Performance;

use Watson\Rememberable\Rememberable;
use App\Jobs\EmailJob;
use App\Mail\CustomVacancyEmail;


class Seeker extends Model
{
    use Rememberable, Notifiable;
    use SearchableTrait;
    public $rememberFor = 2;

     /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'seekers.public_name' => 10,
            'seekers.resume_contents' => 5,
            'seekers.id' => 3,
        ]
    ];
    
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
        Our <a href='".url('/checkout?product=spotlight')."'>Featured Job Seeker Package</a> will ensure your profile stand out and employers get to see you. You'll also <a href='".url('/checkout?product=pro')."'>Get Notifications</a> on applications status change on shortlisting and reasons for rejection if it comes to that. <br>
        We have solutions tailored for your career. Our HR team is dedicated to your growth and, with our <a href='".url('/job-seekers/summit')."'>CV Editing Package</a> opens your Career coaching doors and your profile is featured for 1 year, amongs't other benefits.
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

    // public function getRecommendedPosts($counter = 6){
    //     $counter = $counter < 1 ? 1 : $counter;
    //     $indId = $this->user->seeker->industry_id;
    //     $locId = $this->user->seeker->location_id;
    //     $exp = $this->user->seeker->education_level_id;

    //     $sql = "SELECT id FROM posts WHERE (industry_id = $indId AND status = 'active' AND location_id = $locId)  OR (education_requirements = $exp) ORDER BY id DESC LIMIT $counter";
    //     $results = DB::select($sql);

    //     $posts = [];
    //     for ($i=0; $i < count($results); $i++) { 
    //         $posts[] = Post::find($results[$i]->id);
    //     }
    //     return $posts;

    // }

    /**
     * Get recommended posts from parameters
     */
    public static function recommendedPosts($industry_id)
    {
        return Post::where('industry_id', $industry_id)
            ->whereRaw("UPPER('title') != '". strtoupper('HOW TO APPLY')."'")
            ->where('status','active')
            ->orderBy('featured', 'DESC')
            ->orderBy('created_at','DESC')
            ->paginate(27)->onEachSide(3);
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
    public static function disableProUserByUserId($user_id){
        $seeker = Seeker::where('user_id',$user_id)->first();
        if(isset($seeker->id))
        {
            $seeker->featured = 0;
            return $seeker->save();
        }
        return false;
    }

    public function getRemainingProductDays()
    { 
        //fetch all orders for this user
        $orders = $this->user->orders;

        //if any order is found continue
        if($orders){

                   //loop through all orders
                   for($i=0; $i<count($orders); $i++)
                    {
                        for($k=0; $k<count($orders[$i]->productOrders); $k++)
                        {
                            $productOrder = $orders[$i]->productOrders[$k];

                            //fetch only active spotlight product
                            if($productOrder->product->slug == 'spotlight' && $productOrder->contents != null && $productOrder->contents != 'completed')
                        
                                //return the remaining days
                                return now()->diffInDays(Carbon::parse($productOrder->contents), false);
                        }
                    }
                }
    }

    public function getProductDays()
    { 
        //fetch all orders for this user
        $orders = $this->user->orders;

        //if any order is found continue
        if($orders){

                   //loop through all orders
                   for($i=0; $i<count($orders); $i++)
                    {
                        for($k=0; $k<count($orders[$i]->productOrders); $k++)
                        {
                            $productOrder = $orders[$i]->productOrders[$k];

                            //fetch only active spotlight product
                            if($productOrder->product->slug == 'spotlight' && $productOrder->contents != null && $productOrder->contents != 'completed')
                        
                                //return spotlight days
                                return ($productOrder->days_duration);
                        }
                    }
                }
    }

    //check if jobseeker has resume
    public function hasResume(){
       if( is_null($this->resume) )
            return false;
        return true;
        }

    public function testFeatured(){
        // 
    }

    public function isBeingViewedBy(User $user){
        $seeker = Seeker::where('user_id',$this->user_id)->increment('view_count');
        if($this->canGetNotification())
        {
            $jobs = [];
            if($user->role == 'admin')
            {
                $caption = "A recruiter on Emploi has viewed your profile";
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

            if($this->featured < 1)
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
                    $messages[] = "<b>You have an old Resume!</b> Your Resume was uploaded $days_since days ago, and it is important to update it. Include new achievements and check if outdated information is present."; 
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

            if($this->searching == 0)
            {
                $opportunities = true;
                $messages[] = "Your <b>profile indicates you are not looking for a job</b>, change this setting to searching to be considered for positions."; 
                
            }

            if($this->user->avatar == NULL)
            {
                $opportunities = true;
                $messages[] = "Your have not added a photo to your profile, add a passport size photo of you today to increase your credibility"; 
                
            }
            
            if($opportunities)
            {
                $contents .= "<br>We have some suggestions that may increase your hireability: <ol>";
                for($i=0; $i<count($messages); $i++)
                    $contents .= "<li>".$messages[$i]."</li>";
                $contents .= "</ol>";

                $contents .="<br>Click <a href='".url('/profile/edit')."'>here</a> to update your profile.";
            }

            $contents .="<br> View your <a href='".url('/job-seekers/dashboard')."'>profile performance summary</a>.";

            $contents .= "<br><br> We offer <a href='".url('/v2/job-seekers/cv-editing/create')."'>Professional CV Editing Services</a> which comes with career coaching and interview preparation which are essential when looking for work.";
            
            //return $contents;



            //shortlisting jobs, focus on applied
            
            
            EmailJob::dispatch($this->user->name, $this->user->email, 'Profile Viewed', $caption, $contents);
        }
    }

    public function canGetNotification(){
        if($this->featured >= 1)
            return true;
          if($this->featured == -1)
            return true;
        $orders = $this->user->orders;
        for($i=0; $i<count($orders); $i++)
        {
            for($k=0; $k<count($orders[$i]->productOrders); $k++)
            {
                $productOrder = $orders[$i]->productOrders[$k];
                if($productOrder->product->slug == 'pro' && $productOrder->contents != null && $productOrder->contents != 'completed')
                    return true;
            }
        }
        return false;
    }

    public function isOnPaas(){
        $sp = SeekerSubscription::where('user_id',$this->user->id)
                ->Where('status', 'active')
                ->first();

        if(isset($sp->id))
            return true;
        return false;
    }

    public function activateFreeGoldenClub($days = 30){
        $product = Product::where('slug','golden_club')->first();
        if(isset($product->id))
        {
            $order = Order::create([
                'user_id' => $this->user->id,
                'slug' => Order::generateUniqueSlug(10)
            ]);
            $productOrder = ProductOrder::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'days_duration' => $days,
                'price' => 0
            ]);
            $invoice = Invoice::create([
                'order_id' => $order->id,
                'slug' => Invoice::generateUniqueSlug(11),
                'first_name' => $this->user->name,
                'phone_number' =>$this->phone_number,
                'email' => $this->user->email,
                'description' => $product->description,
                'sub_total' => 0,
                'alternative_payment_slug' => 'Free Golden Club Package'
            ]);
           
            $user = SeekerSubscription::where('email',$this->user->email)->where('status','inactive')->first();
            if(isset($user))
            {
               $user->status = 'active';
               $user->ending = now()->addMonths(1);
               $user->save();

                        $caption = "Job Seeker Golden Club subscriptions activated on Emploi";
                        $contents = "You have successfully subscribed to the Golden Club which enables you to be placed for part time jobs from top employers, this will remain active for a period of one month. <br>
                          You will be eligible to the following benefits: <br>
                          <ul>
                              <li>Guaranteed placement on an on-demand basis to more than one company.</li>
                              <li>Access to profession-based training and development opportunities.</li>
                              <li>Increased chances for eventual permanent employment.</li>
                              <li>Guaranteed income after successful placement.</li>
                              <li>Great networking opportunities with top employers.</li>
                          </ul>

                        <p>If you require further information on your subscription, <a href='".url('/contact')."'>Contact Us</a>.</p>

                        We wish you the very best. 

                        <br>";
                        EmailJob::dispatch( $this->user->name, $this->user->email, 'Golden Club activated', $caption, $contents);
            }

 

        }
        //create order
        //create product order
        //send slack notification
        //activate golden club

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
    public function hasAppliedTask($task){
        $t = PartTimer::where('user_id',$this->user->id)
                ->where('task_slug',$task->slug)->first();
        if(isset($t->id))
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


    //get industry match
    public function getIndustryMatch($post){        
        if(isset($this->industry_id) && $this->industry_id == $post->industry_id)
        {
            return 1;
        }else{
            return 0.1;
        }
    }

    //get experience match
    public function getExperienceMatch($post){
        if(isset($this->years_experience) && $this->years_experience >= ($post->experience_requirements)/12)
        {
            return 1;
        }else{
            return ($this->years_experience)/($post->experience_requirements/12);
        }
    }

    //get education level match
    public function getEducationLevelMatch($post){
        if(isset($this->education_level_id) && $this->education_level_id >= $post->education_requirements)
        {
            return 1;
        }else{
            return ($this->education_level_id)/($post->education_requirements);
        }
    }

    //get location match
    public function getLocationMatch($post){
        if(isset($this->location_id) && $this->location_id == $post->location_id)
        {
            return 1;
        }else{
            return 0.5;
        }
    }

    //get Assessment Score
    public function getAssessmentScore(){
        $score= TestResult::where('email', $this->user->email)->where('type', 'aptitude')->get()->pluck('score')->last();
        if(isset($score))
        {   
            return ($score/100);
        }else{
            return 0.1;
        }
    }

    //RSI calculation
    public function calculateRsi($post){
        //experience
        $experience = (Seeker::getExperienceMatch($post))/1*40;

        //industry
        $industry = (Seeker::getIndustryMatch($post))/1*20;
        
        //referee feedback      
        $referee_assessment = (JobApplicationReferee::scoreRefereeReport($this->id))/1*15;

        //assessment results
        $assessment = (Seeker::getAssessmentScore())/1*10;

        //education
        $education = (Seeker::getEducationLevelMatch($post))/1*10;

        //location
        $location =  (Seeker::getLocationMatch($post))/1*5;
         
        //add all
        $total = $experience+$industry+$referee_assessment+$assessment+$education+$location;

        //return RSI final value
        return round($total);           
    }

    //function to calculate the value of job score(rsi)
    public function getRsi($post){
        //set percentage value of RSI score to zero
        $perc = 0;

        //check if user has any assessmnent done before
        $assessment_result=Performance::where('email', $this->user->email)->first();
            if(isset($assessment_result->id)){
                //add the assessment score to his/her job score 
                $perc += Performance::recentScore($this->user->email)/2;
            }

        // If the candidate is in the same industry as the posted job
        if(isset($this->industry_id) && $this->industry_id == $post->industry_id) {
            //adds the 4 to a percentage value and assigns the result to $perc
            $perc += 4;
        }

        //referee feedback from assessment report
            $referee_assessment=JobApplicationReferee::where('seeker_id', $this->id)->first();
            if(isset($referee_assessment->id)){
                //add the assessment score to his/her job score 
                $perc += JobApplicationReferee::scoreRefereeReport($this->id);
            }

        // if jobseeker has incomplete profile(cv and education level missing) or post has no model seeker
        if(!$this->hasCompletedProfile() || !$post->hasModelSeeker())
            //return $perc 
            return round($perc);

        // Get the rsi model set by the employer ? 
        $model = $post->modelSeeker;

        // Get the sum of all the rsi model parameters ? 
        $total = 
            $model->education_level_importance + 
            $model->experience_importance + 
            $model->skills_importance + 
            $model->personality_importance + 
            $model->interview_importance + 
            $model->psychometric_importance +  
            $model->company_size_importance +
            $model->feedback_importance;

        // Get the instance of the seekers job application of a post
        $application = JobApplication::where('user_id',$this->user->id)
                    ->where('post_id',$post->id)
                    ->first();

        // If the interview parameter of the rsi model has been set ? 
        if($model->interview)
        {
            // Find the score according to interview importance as set by employer
            $interview = $model->interview_importance == 0 ? 0 : $model->interview_importance / $total * 100;
        }
        else
        {
            // if not set interview parameters
            $total -= $model->interview_importance;
            $interview = 0;
        }
         
        // If the psychometric parameter of the rsi model has been set
        if($model->psychometric)
        {
            // Find the score according to psychometrics importance as set by employer
            $psy = $model->psychometric_importance == 0 ? 0 : $model->psychometric_importance / $total * 100;
        }
        else
        {
            // if no set psychometric parameters 
            $total -= $model->psychometric_importance;
            $psy = 0;
        }
        
        // Find the score according to education level, experience, skills, personality, company size and feedback importance as set by employer
        $edu = $model->education_level_importance == 0 ? 0 : $model->education_level_importance / $total * 100;
        $exp = $model->experience_importance == 0 ? 0 : $model->experience_importance / $total * 100;
        $skil = $model->skills_importance == 0 ? 0 : $model->skills_importance / $total * 100;
        $pers = $model->personality_importance == 0 ? 0 : $model->personality_importance / $total * 100;
        $cosize = $model->company_size_importance == 0 ? 0 : $model->company_size_importance  / $total * 100;
        $ref = $model->feedback_importance == 0 ? 0 : $model->feedback_importance / $total * 100;

        // If the jobseeker has applied for job
        if(isset($application->id)) //psychometric
        {
            // If the psychometric test results have been uploaded
            if(count($application->psychometricTests) > 0)
            {
                // If the candidate has scored a higher  psychometric score than the rsi model set by emplplyer 
                if($application->psychometricScore > $model->psychometric_test_score)
                    $perc += $psy;
                // If the candidate has scored a similar psychometric score to the rsi model set by emplplyer 
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

        // If the interview results have been uploaded
        if(isset($application->id))
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

                //if education level is similar to what is required by employer
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

        //check industry and experience match
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
        
        //skills
        if(count($model->modelSeekerSkills) > 0 || $model->other_skills != null && count(json_decode($model->other_skills)) > 0) 
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

            //other skills
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

        //previous job seeker company size
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
        return round($perc);
    }

    public function calculateProfileCompletion()
    {
        //initialize completed to zero
        $completed = 0;
        //profile sections
        $profileElements = ['resume', 'education_level_id', 'education', 'years_experience',  'experience', 'phone_number', 'current_position'];
        //total profile sections
        $total = count($profileElements);
        //loop through profile sections adding one to completed where not empty
        foreach($profileElements as $element) {
            $completed += !empty($this->{$element}) ? 1 : 0;
        }
        
        //find the profile completion ratio
        $completed = round($completed / $total * 70); 
        

        //add 12 to profile completion if a job seeker is featured
        if ($this->user->seeker->featured > 0) 
        {
            $completed = $completed + 12;
        }
        
        //add 6 to profile completion if a job seeker has indicated location
        if ($this->user->seeker->location_id != NULL) {
            $completed = $completed + 6;
        }
        
        //add 6 to profile completion if a job seeker has objectives
        if ($this->user->seeker->objective != NULL)
        {
            $completed = $completed + 6;
        }
        //add 6 to profile completion if a job seeker has profile photo
        if ($this->user->avatar != NULL) 
        {
            $completed = $completed + 6;
        }
        //return the final profile percentage
        return $completed;
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
        $featured = Post::where('created_at', '>', Carbon::now()->subDays(20))
                        ->where('status','active')
                        ->where('featured','true')
                        ->orderBy('id','DESC')
                        ->get();

        $vacancies = Post::where('created_at', '>', Carbon::now()->subDays(20))
                    ->where('industry_id',$this->industry_id)
                    ->where('status','active')
                    ->orderBy('created_at','DESC')
                    ->get();        

         $blogs = Blog::All()
                       ->random(3);
         $featuredVacancies = $featured; 
           
        {
    
               if($this->user->hasVerified()){

                $contents ="<p style= 'background:orange; color:white; text-align:center'>SELF ASSESSMENT!!</p> 
                            <p>Click <a href='".url('/')."'>here</a> and do assessment which increases your job score ranking, highlight your key competencies among other benefits.</p>
                                <br>";  

                $caption = "Emploi.co is a smart recruitment engine leveraging data and technology to create instant, accurate matches between candidates and roles.";
    
                $contents  .= '<p style= "background:orange; color:white">';

                $contents .="Here are the Latest Vacancies in <b>".$this->industry->name.",</b> Apply Now.<br>";
                $contents .= '</p>';


                $contents .= '<div style= "text-align:left">';                  
                                  foreach ($vacancies as $v) {
                $contents .= "<ul>";                      
                $contents .= "<li><a href='".url('/vacancies/'.$v->slug)."'>$v->title,</a> ".$v->company->name."</li>";
                $contents .= "</ul>";                  
                   }

                $contents .= '<p style= "background:orange; color:white; text-align:center">';  
                $contents .= "Featured Vacancies";
                $contents .= '</p>';

                            foreach ($featuredVacancies as $f) {
                $contents .= "<ul>"; 
                $contents .= "<li> <a href='".url('/vacancies/'.$f->slug)."'>$f->title,</a> ".$f->company->name."</li>";
                $contents .= "</ul>";                        
                  }   
                
                $contents .= "Click <a href='".url('/vacancies')."'>vacancies</a> for more and how to apply.<br>"; 
                   

                $contents .= '<p style= "background:orange; color:white; text-align:center">'; 
                $contents .= "Blogs From Our Career Centre";
                $contents .= '</p>';
                            foreach ($blogs as $b) {
                $contents .= "<ul>";                             
                $contents .= "<li><a href='".url('/blog/'.$b->slug)."'>$b->title.</a></li>";
                $contents .= "</ul>";
                }    
                $contents .= "<a href='".url('/blog')."'>Read More Blogs</a><br>";
                $contents .= '</div>';                                                                    
                
                if(User::subscriptionStatus($this->user->email)) {    
                EmailJob::dispatch($this->user->name, $this->user->email, 'Trending Job Vacancies', $caption, $contents);
                return true;
                }
                         
            }
        }
             
    }


    public function completeProfileReminder($channel)
    {
        switch ($channel) {
            case 'email':
                $caption = "Complete your job-seeker profile on Emploi.";
                $contents = "Employers are passing over your profile. Complete your profile and update your CV to unlock the following benefits;
                             <ul style= 'text-align:left'>
                                 <li>Entice a recruiter with your complete work and education history</li>
                                 <li>Stand a much higher chance of being shortlisted</li>
                                 <li>Get recommended to an employer</li>
                                 <li>Increase your rank/score</li>
                             </ul>

                Click <a href='".url('/profile/edit')."'>here</a> to complete."
                ;
                EmailJob::dispatch($this->user->name, $this->user->email, 'Complete Profile', $caption, $contents);
                return true;
                break;
            
            default:
                return false;
                break;
        }
    }      
    

    public function sendProfileAnalytics($channel)
        {     

            $caption = "Emploi.co is a smart recruitment engine leveraging data and technology to create instant, accurate matches between candidates and roles.";               
            $contents ="Here is analysis for you;<br><br>

            <p>Your profile has attracted  ".$this->user->seeker->view_count." views. <br></p> 
            <br>
         
            Applications: ".count(\App\JobApplication::Where('user_id',$this->user->id)->get())."<br>
            Shortlisted: ".count(\App\JobApplication::Where('user_id',$this->user->id)->Where('status', 'shortlisted')->get())."<br>
            Rejected: ".count(\App\JobApplication::Where('user_id',$this->user->id)->Where('status', 'rejected')->get())."<br>

            
            <a href='".url('/checkout?product=spotlight')."'>Subsribe to the yearly plan and get a one month free.</a>    
            ";                                                                                
               

            EmailJob::dispatch($this->user->name, $this->user->email, 'Get One Month Free On Spotlight Annual Plan', $caption, $contents);
            return true;
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


    public function findRsi(){
        //return $this->getPlainRsi($post);
        $perc = 0;

        $profileElements = ['resume', 'education_level_id', 'education', 'years_experience',  'experience', 'phone_number', 'current_position'];
        $total = count($profileElements);
        foreach($profileElements as $element) {
            $perc += !empty($this->{$element}) ? 1 : 0;
        }

        $perc = round($perc / $total * 18); 

        if ($this->user->seeker->featured > 0) 
        {
            $perc = $perc + 4;
        }
        
        if ($this->user->seeker->location_id != NULL) {
            $perc = $perc + 1;
        }
        
        if ($this->user->seeker->objective != NULL)
        {
            $perc = $perc + 1;
        }

        if ($this->user->avatar != NULL) 
        {
            $perc = $perc + 1;
        }


         $task = Task::where('industry',$this->user->seeker->industry->name)
                    ->first();

        if($task)
        {
            $perc = $perc+2;
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
            if($hire)
                $perc = $perc + 1.5;
            // elseif($nohire)
            //     $perc = $perc * 0.85;

            //performance
            if($performance >= 90)
                $perc = $perc + 1.25;
            elseif($performance>=75)
                $perc = $perc + 1;
            elseif($performance>=60)
                $perc = $perc + 0.75;
            elseif($performance>=50)
                $perc = $perc + 0.5;
            elseif($performance>=30)
                $perc = $perc + 0.25;
            else
                $perc = $perc + 0.1;


            //work quality
            if($workQuality >= 90)
                $perc = $perc + 1.25;
            elseif($workQuality>=75)
                $perc = $perc + 1;
            elseif($workQuality>=60)
                $perc = $perc + 0.75;
            elseif($workQuality>=50)
                $perc = $perc + 0.5;
            elseif($workQuality>=30)
                $perc = $perc + 0.25;
            else
                $perc = $perc + 0.1;

            //ability to meet targets

            if($targets >= 90)
                $perc = $perc + 1.25;
            elseif($targets>=75)
                $perc = $perc + 1;
            elseif($targets>=60)
                $perc = $perc + 0.75;
            elseif($targets>=50)
                $perc = $perc + 0.5;
            elseif($targets>=30)
                $perc = $perc + 0.25;
            else
                $perc = $perc + 0.1;

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
                $perc = $perc + 0.5;
            elseif($mod)
                $perc = $perc + 0.85;
            elseif($minor)
                $perc = $perc + 0.95;

        }

               
        // $perc=$perc+26;
        return round($perc,2);
    }

 public function sendMassProfileViewedEmail(){
    //increment profile view counter
    $seeker = Seeker::where('user_id',$this->user_id)->increment('view_count');
  
        //jobseeker with id less than 14000 i.e approx half
        if($this->id < 30000)
        {   
            //administrator
            $caption = "A recruiter on Emploi has viewed your profile";
            $contents = "Emploi Administrator, an Emploi Recruitor, has viewed your profile, and may consider you for positions they are recruiting internally or for clients. ";
        }
        else
        {
            $caption = "An employer on Emploi has viewed your profile";
            //employer
            $contents = "Emploi Recruitment, an Employer, has viewed your profile, and may consider you for positions they are recruiting. ";
        }
            

        $opportunities = false;
        $messages = [];

        //when no CV attached
         if(!$this->resume)
        {
            $opportunities = true;
            $messages[] = "<b style='color: red'>You have not attached a Resume!</b> Without a resume, recruiters and employers disregard your profile. Your profile will also be harder to find and your Role Suitability Score for applications you make is affected negatively."; 
            
        }
        else
        {   //when 30 days has elapsed since last CV update
            $days_since = Carbon::parse($this->updated_at)->diff(Carbon::now())->days;
            if($days_since > 30)
            {
                $opportunities = true;
                $messages[] = "<b>You have an old Resume!</b> Your Resume was uploaded $days_since days ago, and it is important to update it. Include new achievements and check if outdated information is present."; 
            }
        }

        //when age is not indicated
        if(!$this->age)
        {
            $opportunities = true;
            $messages[] = "You have not indicated your age on Emploi. This is crucial as HR personnel are keen on age when hiring."; 
            
        }

        //when indicated age is less than 18years
        elseif($this->age && $this->age < 18)
        {
            $opportunities = true;
            $messages[] = "The age you indicated is below 18. Kindly ensure this is correct as it may reduce your hireability."; 
        }

        //when phone number is not indicated
        if(!$this->phone_number)
        {
            $opportunities = true;
            $messages[] = "You have not indicated a valid phone number on your profile. Include this so you can be reached easily."; 
            
        }

        //when no experience is indicated
        if(!$this->years_experience)
        {
            $opportunities = true;
            $messages[] = "You have not indicated your total experience duration. Recruiters are in a rush and want to assess you quickly."; 
            
        }
        
        //when jobseeker has not indicated location
        if(!$this->location_id)
        {
            $opportunities = true;
            $messages[] = "Your current location is not indicated on your profile."; 
            
        }

        //when jobseeker has indicated that they are not searching
        if($this->searching == 0)
        {
            $opportunities = true;
            $messages[] = "Your <b>profile indicates you are not looking for a job</b>, change this setting to searching to be considered for positions."; 
            
        }
        
        //when no profile photo is attached
        if($this->user->avatar == NULL)
        {
            $opportunities = true;
            $messages[] = "Your have not added a photo to your profile, add a passport size photo of you today to increase your credibility"; 
            
        }
        
        if($opportunities)
        {
            $contents .= "<br>We have some suggestions that may increase your hireability: <ol>";
            for($i=0; $i<count($messages); $i++)
                $contents .= "<li>".$messages[$i]."</li>";
            $contents .= "</ol>";

            $contents .="<br>Click <a href='".url('/profile/edit')."'>here</a> to update your profile.";
        }

        $contents .="<br> View your <a href='".url('/job-seekers/dashboard')."'>profile performance summary</a>.";

        $contents .= "<br><br> We offer <a href='".url('/v2/job-seekers/cv-editing/create')."'>Professional CV Editing Services</a> which comes with career coaching and interview preparation which are essential when looking for work.";
              
        
        EmailJob::dispatch($this->user->name, $this->user->email, 'An employer has viewed your profile', $caption, $contents);
        return true;
    }

    /**
     * Get seekers based on filter
     */
    public static function filteredSeekers($filters = []){
        
        // Remove null values
        $filters = array_filter($filters);

        // Remove token key
        unset($filters['_token']);
        unset($filters['post']);

        // If no filters set but form submitted
        if(empty($filters)){
            return Seeker::all();
        }
        
        // Initial collection to search from
        $collection = Seeker::all();

        // Create a new seeker instance to enable use of an external method 
        $seeker = new Seeker;

        foreach($filters as $filter => $filter_value){
            $results = $seeker->filterCollection($filter, $filter_value, $collection);

            $collection = $results;
        }

        return $collection;
    }

    // Dynamic filters
    public function filterCollection($filter, $filter_value, $collection)
    {
        // Also check if a collection has been passed
        if($filter == 'location' && isset($collection)){
            return $collection->filter(function ($seeker) use($filter_value){
                if(isset($seeker->location))
                    // Convert filter value to int first 
                    return $seeker->location->name == $filter_value;
            });
        }

        if($filter == 'industry' && isset($collection)){
            return $collection->filter(function ($seeker) use($filter_value){
                return $seeker->industry->name == $filter_value;
            });
        }

        if($filter == 'educationLevel' && isset($collection)){
            return $collection->filter(function ($seeker) use($filter_value){
                if(isset($seeker->education_level_id))
                    return $seeker->educationLevel->name == $filter_value;
            });
        }

        if($filter == 'sort' && isset($collection)){
            return $collection->filter(function ($seeker) use($filter_value){
                //filter by has CV
                if($filter_value == 'with-cv'){
                    return $seeker->hasResume() == $filter_value;             
                }
                
                //filter by has self assessment
                if($filter_value == 'with-assessment'){
                    return $seeker->user->assessed() == $filter_value;             
                }      
            });
        }
    }

    public function sendIndustryVacancyEmail()     

    {       
        $featured = Post::where('created_at', '>', Carbon::now()->subDays(20))
                        ->where('status','active')
                        ->where('featured','true')
                        ->orderBy('id','DESC')
                        ->get();

        $vacancies = Post::where('created_at', '>', Carbon::now()->subDays(20))
                    ->where('industry_id',$this->industry_id)
                    ->where('status','active')
                    ->orderBy('created_at','DESC')
                    ->get();        

         $blogs = Blog::All()
                       ->random(3);
         $featuredVacancies = $featured; 
           
        {


            $caption = "Emploi.co is a smart recruitment engine leveraging data and technology to create instant, accurate matches between candidates and roles.";

            $contents ="Receive greetings from Emploi.<br>
                        Still in the Human Resource field?<br>
                        We currently have openings in Human Resource  that might interest you.<br><br>

                        Kindly check the qualifications on  <a href='".url('http://bit.ly/361VSIB')."'>http://bit.ly/361VSIB</a> and <a href='".url('http://bit.ly/3sKsoJ6')."'>http://bit.ly/3sKsoJ6</a> and apply.<br>

                        Find more jobs from Emploi:
                        View all jobs at <a href='".url('http://bit.ly/2KA5QcR')."'>http://bit.ly/2KA5QcR</a> <br><br><br>                        
                         ____________________<br>

                        Want to get noticed by Employers?<br>
                        <a href='".url('http://bit.ly/391szIc')."'>Subscribe to our Spotlight package at only kshs.259</a>";                                                                  
            
            if(User::subscriptionStatus($this->user->email)) {    
            EmailJob::dispatch($this->user->name, $this->user->email, 'Human Resource Vacancies for you', $caption, $contents);
            return true;
            }
        }
             
    }

    public function activateFreeSpotlight($days = 14){
        //get the first element in product collection with spotlight slug
        $product = Product::where('slug','spotlight')->first();
        
        //get first name from fullnames
        $last_name = (strpos($this->user->name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $this->user->name);
        //get last name from fullnames
        $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $this->user->name ) );

        if(isset($product->id))
        {   
            //create order
            $order = Order::create([
                'user_id' => $this->user->id,
                'slug' => Order::generateUniqueSlug(15)
            ]);

            //create product order
            $productOrder = ProductOrder::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'days_duration' => $days,
                'price' => 0
            ]);

            //create invoice
            $invoice = Invoice::create([
                'order_id' => $order->id,
                'slug' => Invoice::generateUniqueSlug(11),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $this->user->email,
                'phone_number' => $this->user->seeker->phone_number,
                'description' => $product->description,
                'sub_total' => 0,
                'alternative_payment_slug' => 'Free Spotlight Package'
            ]);

            // ProductOrder::enablePending();

        }
    }

    public function verifyAccountEmail()
    {     
        if(!$this->user->hasVerified()){
        $caption = "Free spotlight plan by verifying your account.";
        $contents = "Verify your Emploi account now by clicking <a href='".url('/verify-account/'.$this->user->email_verification)."'>here</a> to enjoy a free 14 days of our spotlight plan.<br>
            Spotlight plan enables you to receive notifications whenever: <br>
            <ul>
                <li>An Employer views your profile</li>
                <li>You apply for a job</li>
                <li>An Employer shortlists you for a position</li>
                <li>An Employer does not shortlist you for a job with possible reasons</li>
            </ul>
            <br>

            Your profile will rank among the first on our database and be prioritized whenever an employer browses for potential employees. 
            
            <p>
                Do not leave your fate to chance, jump on while the offer lasts!
                We wish you the very best in your job search.                   
            </p>
            ";
        EmailJob::dispatch($this->user->name, $this->user->email, 'VALENTINES OFFER; ENJOY A FREE SPOTLIGHT PACKAGE', $caption, $contents);
        return true;
        }
    } 

    /**
     * Get featured job seekers
     */
    public static function getFeaturedSeekers()
    {
        return Seeker::where('featured','>=', 1)->get();
    }

    /**
     * Get jobseeker experience level
     */
    public static function getSeekerExperienceLevel($yearsOfExperience) 
    {
        switch ($yearsOfExperience) {
            case 0:
            case 1:
                return 'entry level';
                break;

            case 2:
            case 3:
            case 4:
            case 5:
                return 'mid level';
                break;
            
            case 6:
                return 'career change';
                break;

            case 7:
            case 8:
                return 'management level';
                break;

            case $yearsOfExperience > 8:
                return 'senior management level';
                break;
            
            default:
                break;
        }
    }

    /**
     * Get applicable CV Editing package
     */
    public static function getCvEditingPackage($yearsOfExperience) 
    {
        $experience_level = Seeker::getSeekerExperienceLevel($yearsOfExperience);

        switch ($experience_level) {
            case 'entry level':
                return 'entry_level_cv_edit';
                break;

            case 'mid level':
                return 'mid_level_cv_edit';
                break;
                
            case 'career change':
                return 'c_change_cv_edit';
                break;

            case 'management level':
                return 'mgnt_cv_edit';
                break;
            case 'senior management level':
                return 's_mgnt_cv_edit';
                break;
            
            default:
                break;
        }
    }
}
