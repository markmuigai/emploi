<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplicationReferee extends Model
{
    protected $fillable = [
        'seeker_id','referee_id','reason_for_leaving','strengths','weaknesses','discplinary_cases','professionalism','would_you_rehire','comments','status'
    ];

    public function seeker(){
    	return $this->belongsTo(Seeker::class);
    }

    public function referee(){
    	return $this->belongsTo(Referee::class);
    }

    public function seekerApplications(){
    	return $this->hasMany(SeekerApplication::class);
    }
    
    public static function scoreRefereeReport($id)
    {
        //referee feedback from assessment report
        $perc = 0;
        $seeker = Seeker::where('id', $id)->first();
        $referee_assessment = JobApplicationReferee::where('seeker_id', $id)->get();
        $ref = Referee::where('seeker_id', $id)->first();
        if(isset($ref))
        //add referee count to the final rsi score
            {
            $perc += 0.5;
            }

        if(count($referee_assessment) > 0)
        {
            $performance = array();
            $workQuality = array();
            $targets = array();
            $rehire = array();
            $discplinary = array();

            for($i=0; $i<count($seeker->jobApplicationReferees); $i++)
            {
                $rf = $seeker->jobApplicationReferees[$i];
                
                    array_push($discplinary, $rf->discplinary_cases);
                    array_push($rehire, $rf->would_you_rehire);
            }

            for($i=0; $i<count($seeker->seekerJobs); $i++)
            {
                if($seeker->seekerJobs[$i]->referee->status != 'ready')
                    continue;
                $sj = $seeker->seekerJobs[$i];
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
                $perc = $perc += -0.01;
            // elseif($nohire)
            //     $perc = $perc * 0.85;

            //performance
            if($performance >= 90)
                $perc = $perc += 0.1;
            elseif($performance>=75)
                $perc = $perc += 0.08;
            elseif($performance>=60)
                $perc = $perc += 0.06;
            elseif($performance>=50)
                $perc = $perc += 0.04;
            elseif($performance>=30)
                $perc = $perc += 0.02;
            else
                $perc = $perc += 0.01;


            //work quality
            if($workQuality >= 90)
                $perc = $perc * 0.1;
            elseif($workQuality>=75)
                $perc = $perc += 0.08;
            elseif($workQuality>=60)
                $perc = $perc += 0.06;
            elseif($workQuality>=50)
                $perc = $perc += 0.04;
            elseif($workQuality>=30)
                $perc = $perc += 0.02;
            else
                $perc = $perc += 0.01;

            //ability to meet targets

            if($targets >= 90)
                $perc = $perc += 0.1;
            elseif($targets>=75)
                $perc = $perc += 0.08;
            elseif($targets>=60)
                $perc = $perc += 0.06;
            elseif($targets>=50)
                $perc = $perc += 0.04;
            elseif($targets>=30)
                $perc = $perc += 0.02;
            else
                $perc = $perc += 0.01;

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
                $perc = $perc * 0.05;
            elseif($mod)
                $perc = $perc * 0.15;
            elseif($minor)
                $perc = $perc * 0.2;
        }
        return $perc;
    }
}
