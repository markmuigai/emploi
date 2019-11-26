<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\CvRequest;
use App\JobApplication;

use Carbon\Carbon;

class Employer extends Model
{
    protected $fillable = [
        'user_id', 'name', 'industry_id','company_name', 'contact_phone','company_phone','company_email','country_id','address','credits'
    ];

    public function industry(){
    	return $this->belongsTo(Industry::class,'industry_id');
    }

    public function country(){
    	return $this->belongsTo(Country::class,'country_id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id');
    }

    public function getCompaniesAttribute(){
        return $this->user->companies;
    }

    public function hasRequestedCV($seeker)
    {
        $r = CvRequest::where('employer_id',$this->id)->where('seeker_id',$seeker->id)->first();
        if(isset($r->id))
            return true;
        return false;
    }

    public function savedProfiles(){
        return $this->hasMany(SavedProfile::class);
    }

    public function getPostsAttribute(){
        $companies = $this->user->companies;
        $posts = array();
        for($i=0; $i<count($companies); $i++)
        {
            for($k=0; $k<count($companies[$i]->posts); $k++)
            {
                array_push($posts, $companies[$i]->posts[$k]);
            }
        }
        return $posts;
    }

    public function getWeekApplicationsCounterAttribute(){
        $weekMap = [
            0 => 'Sun',
            1 => 'Mon',
            2 => 'Tue',
            3 => 'Wed',
            4 => 'Thu',
            5 => 'Fri',
            6 => 'Sat',
        ];
        $stats = array();
        for($i=6; $i>=0; $i--)
        {
            $day = Carbon::now()->subDays($i);
            $counter = count($this->getApplicationsOn($day));


            array_push($stats, array($counter,$weekMap[$day->dayOfWeek]));
        }
        return $stats;
    }

    public function getActivePostsAttribute(){
        $companies = $this->user->companies;
        $posts = array();
        for($i=0; $i<count($companies); $i++)
        {
            for($k=0; $k<count($companies[$i]->posts); $k++)
            {
                if($companies[$i]->posts[$k]->status == 'active')
                    array_push($posts, $companies[$i]->posts[$k]);
            }
        }
        return $posts;
    }

    public function getClosedPostsAttribute(){
        $companies = $this->user->companies;
        $posts = array();
        for($i=0; $i<count($companies); $i++)
        {
            for($k=0; $k<count($companies[$i]->posts); $k++)
            {
                if($companies[$i]->posts[$k]->status != 'active')
                    array_push($posts, $companies[$i]->posts[$k]);
            }
        }
        return $posts;
    }

    public function recentApplications($counter = 5){
        $posts = array();
        for($i=0; $i<count($this->companies); $i++)
        {
            for($k=0; $k<count($this->companies[$i]->posts); $k++)
            {
                array_push($posts, $this->companies[$i]->posts[$k]);
            }
        }

        $new_posts = '(';
        for($i=0; $i<count($posts); $i++)
        {
            $new_posts .= $posts[$i]->id;
            if($i < count($posts)-1)
                $new_posts .= ',';
        }
        $new_posts .= ')';

        if($new_posts == '()')
            return array();

        $sql = "SELECT id FROM job_applications WHERE post_id IN  $new_posts ORDER BY created_at DESC LIMIT $counter";
        $results = DB::select($sql);

        $applications = array();

        for($i=0; $i<count($results); $i++)
            array_push($applications,JobApplication::find($results[$i]->id));

        return $applications;
    }

    public function getApplicationsOn($day){
        $posts = array();
        for($i=0; $i<count($this->companies); $i++)
        {
            for($k=0; $k<count($this->companies[$i]->posts); $k++)
            {
                array_push($posts, $this->companies[$i]->posts[$k]);
            }
        }

        $new_posts = '(';
        for($i=0; $i<count($posts); $i++)
        {
            $new_posts .= $posts[$i]->id;
            if($i < count($posts)-1)
                $new_posts .= ',';
        }
        $new_posts .= ')';

        if($new_posts == '()')
            return array();

        // $real_day = $day->isoFormat('M/D/YYYY');

        // dd($real_day);

        $sql = "SELECT id FROM job_applications WHERE post_id IN  $new_posts";
        $results = DB::select($sql);

        $applications = array();

        for($i=0; $i<count($results); $i++)
        {
            $application = JobApplication::find($results[$i]->id);
            $create_day = new Carbon($application->created_at);
            $create_day = $create_day->format('Y-m-d');
            $day = new Carbon($day);
            $day = $day->format('Y-m-d');
            if($day == $create_day)
                array_push($applications,$application);
        }



        //dd($applications);

        return $applications;



    }
}
