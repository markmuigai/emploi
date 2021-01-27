<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Referee;
use App\SeekerApplication;

use App\Jobs\EmailJob;
use Watson\Rememberable\Rememberable;

class JobApplication extends Model
{
    use Rememberable;
    public $rememberFor = 10;

    protected $fillable = [
        'user_id','post_id','cover','status'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function interviewResults(){
        return $this->hasMany(InterviewResult::class);
    }

    public function seekerPreviousCompanySizes(){
        return $this->hasMany(SeekerPreviousCompanySize::class);
    }

    public function getInterviewScoreAttribute(){
        $total = 0;
        $counter = 0;
        if(count($this->interviewResults) == 0)
            return 0;
        for($i=0; $i<count($this->interviewResults); $i++)
        {
            $total += $this->interviewResults[$i]->score;
            $counter++;
        }
        return round($total/$counter);
    }

    public function reject($message = ''){
        if($this->status != 'rejected')
        {
            $this->status = 'rejected';
            if($this->save())
            {
                if($message == '')
                {
                    $message = 'The recruiter left no message for you regarding this application. You may be offered another position if the recruiter feels you meet requirements. If you have queries, kindly contact us.';
                }
                else
                {
                    $message = '<br><b>Message from Recruiter</b>:<br> '.$message.'<br>';
                }

                if($this->user->seeker->canGetNotification())
                {
                    $caption = "Application ".$this->id." for ".$this->post->title." was Rejected";
                    $contents = "Your application for the <b>".$this->post->title."</b> position, as advertised by ".$this->post->company->name." was rejected. This application will no longer be considered.  $message

                    <br>
                    Your Role Suitability Index Score (RSI) for this application was ".$this->user->seeker->getRsi($this->post)."%. The RSI indicates to what extent you  fit the position by checking your Education, Experience, Skills, Position, and Referee assessment amongs't other factors. To get a higher score, ensure your profile is complete and follow up with your referees for a good assessment. 
                    <br>

                    For additional information, feel free to call our office or write to us. <a href='".url('/vacancies')."'>See Latest Vacancies</a>
                    <br>
                    Thank you for choosing Emploi.
                    <br>
                    ";
                    EmailJob::dispatch($this->user->name, $this->user->email, "Application Rejected", $caption, $contents);
                }
                return true;

            }

        }
        return false;
    }
    

    public function iqTests(){
        return $this->hasMany(IqTest::class);
    }

    public function getIqScoreAttribute(){
        $total = 0;
        $counter = 0;
        if(count($this->iqTests) == 0)
            return 0;
        for($i=0; $i<count($this->iqTests); $i++)
        {
            $total += $this->iqTests[$i]->score;
            $counter++;
        }
        return round($total/$counter);
    }

    public function psychometricTests(){
        return $this->hasMany(PsychometricTest::class);
    }

    public function getPsychometricScoreAttribute(){
        $total = 0;
        $counter = 0;
        if(count($this->psychometricTests) == 0)
            return 0;
        for($i=0; $i<count($this->psychometricTests); $i++)
        {
            $total += $this->psychometricTests[$i]->score;
            $counter++;
        }
        return round($total/$counter);
    }

    public function seekerPersonality(){
        return $this->hasOne(SeekerPersonality::class);
    }

    public function seekerApplications(){
        return $this->hasMany(SeekerApplication::class);
    }

    public function usesReferee($ref_id){
        $r = Referee::findOrFail($ref_id);
        if(!$r->ready)
            return false;
        $sa = $r->jobApplicationReferee;

        $se = SeekerApplication::where('job_application_id',$this->id)
                        ->where('job_application_referee_id',$sa->id)
                        ->first();
        if(isset($se->id))
            return true;
        return false;
    }

    public function toggleUseReferee($ref_id){
        $r = Referee::findOrFail($ref_id);

        if(!$r->ready)
            return false;
        $sa = $r->seekerApplication;
        if(!$this->usesReferee($ref_id))
        {
            SeekerApplication::create([
                'job_application_id' => $this->id,
                'job_application_referee_id' => $r->id
            ]);
            
            //create seeker application
        }
        else
        {
            $sa = SeekerApplication::where('job_application_id',$this->id)
                        ->where('job_application_referee_id',$r->id)
                        ->first();
            $sa->delete();
        }
        return true;

    }

    public function shortlistToggle(){
        if($this->status == 'active')
        {
            $this->status = 'shortlisted';
            if($this->user->seeker->featured > 0)
            {
                $caption = "You have been shortlisted for the ".$this->post->title." Position";
                $contents = $this->post->company->name."'s HR has viewed your profile and is interested. The recuiter may call you or someone in their organization will reach out to you on this position. To increase your chances further, ensure your profile has been completed and your resume up to date with no errors. <br>

                <br>
                Emploi Team Wishes you the best.
                <br><br>
                ";

                EmailJob::dispatch($this->user->name, $this->user->email, "Shortlisted for ".$this->post->title, $caption, $contents);
            }
            return $this->save();
        }
        if($this->status == 'shortlisted')
        {
            $this->status = 'active';
            return $this->save();
        }
        return false;
    }
    
    /**
     * Get interviews for an application
     */
    public function interview(){
        return $this->hasOne('App\Interview', 'job_application_id');
    }

    /**
     * Get the assessment performance associated with an application
     */
    public function performance()
    {
        return $this->belongsToMany('App\Performance', 'application_performance', 'application_id', 'performance_id');
    }

    /**
     * Get the total score of an applicants assessment
     */
    public function score()
    {
        return ($this->aptitudeTestResults()->pluck('correct')->avg())*100;
    }

    /**
     * Personality test results
     */
    public function personalityTestResults()
    {
        return $this->performance->filter(function($perf){
            return $perf->question->type == 'personality';
        });
    }

    /**
     * Aptitude test results
     */
    public function aptitudeTestResults()
    {
        return $this->performance->filter(function($perf){  
            return $perf->question->type == 'aptitude';
        });
    }
}
