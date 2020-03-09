<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Referee;
use App\SeekerApplication;

use App\Jobs\EmailJob;

class JobApplication extends Model
{

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
            $this->save();

            if($message == '')
            {
                $message = 'You may be offered another position if the recruiter feels you meet requirements.';
            }
            else
            {
                $message = '<br><b>Message from Recruiter</b>:<br> '.$message.'<br>';
            }

            //$message = $message != '' ? $message : 'You may be offered another position if the recruiter feels you meet requirements.';

            if($this->user->seeker->canGetNotifications())
            {
                $caption = "Application ".$this->id." for ".$this->post->title." was Rejected";
                $contents = "Your application for the <b>".$this->post->title."</b> position, as advertised by ".$this->post->company->name." was rejected. This application will no longer be considered.  $message

                <br>
                Your RSI score for this application was ".$this->user->seeker->getRsi($this->post)."%
                <br>

                For additional information, feel free to call our office or write to us. <a href='".url('/vacancies')."'>See Latest Vacancies</a>
                <br>
                Thank you for choosing Emploi.
                <br>
                ";
                EmailJob::dispatch($this->user->name, $this->user->email, "Application Rejected", $caption, $contents);
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
    


}
