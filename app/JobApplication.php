<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Referee;
use App\SeekerApplication;

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
