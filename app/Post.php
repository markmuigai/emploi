<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Blog;
use App\JobApplication;
use App\Like;
use App\User;

use Watson\Rememberable\Rememberable;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use Rememberable;
    public $rememberFor = 20;
    protected $fillable = [
        'slug', 'company_id', 'title', 'industry_id','education_requirements', 'experience_requirements','responsibilities','deadline','cover_required','portfolio_required','status','location_id','vacancy_type_id','image','how_to_apply','monthly_salary','verified_by','featured','positions','max_salary','easy_apply'
    ];

    public static function getFeedItems()
    {
        return Post::where('status','active')->orderBy('id','DESC')->limit(100)->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create([
            'link' => url('/vacancies/'.$this->slug),
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->company->name.' is recruiting '.$this->positions.' position(s) in '.$this->title,
            'company' => $this->company->name,
            'category' => $this->industry->name,
            'deadline' => $this->deadline,
            'vacancies' => $this->positions,
            'country' =>$this->country,
            'updated' => $this->updated_at,
            'author' => $this->company->user->name
        ]);
    }

    public function getIndustrySkillsAttribute(){
        if(isset($this->modelSeeker->id))
            return $this->modelSeeker->modelSeekerSkills;
        return [];
        //model seeker skills
    }

    public function getSkillsWeightAttribute(){
        $total = 0;
        if(count($this->industry->industrySkills) == 0)
            return $total;
        foreach($this->industry->industrySkills as $m)
            $total += 1;

        return $total;
    }

    public function getFeaturedApplicationsAttribute(){
        $ret = [];
        $applications = $this->applications;
        for($i=0; $i<count($applications); $i++)
        {
            if($applications[$i]->user->seeker->featured > 0)
                $ret[] = $applications[$i];
        }
        return $ret;
    }

    public function getFeaturedRejectedApplicationsAttribute(){
        $ret = [];
        $applications = $this->applications;
        for($i=0; $i<count($applications); $i++)
        {
            if($applications[$i]->user->seeker->featured > 0 && $applications[$i]->status == 'rejected')
                $ret[] = $applications[$i];
        }
        return $ret;
    }

    public static function composeVacancyEmail()
    {
        $blogs = Blog::orderBy('id','DESC')->limit(2)->get();
        $featuredPosts = Post::where('status','active')->where('featured','true')->orderBy('id','DESC')->get();
        //$featuredPosts = Post::all();
        $featured_ids = $featuredPosts->pluck('id');
        $posts = Post::where('status','active')->where('featured','false')->whereNotIn('id',$featured_ids)->orderBy('id','DESC')->limit(15)->get();

        $message = '<div class="container" style=" overflow: hidden">';

        

        if(count($featuredPosts) > 0)
        {
            $message .= '
            <div class="row" style="overflow: hidden; ">
            <h3 style="text-align:center; "><strong>Featured Vacancies, Apply Now</strong></h3>

            <p style="text-align:center">Here are the latest vacancies we, or our direct clients are shortlisting on Emploi.</p>';
            $message .= '<div class="row">';
            for($i=0; $i<count($featuredPosts); $i++)
            {
                $post = $featuredPosts[$i];
                
                    $message .= '<div style="width: 49%; margin-left: 1%; float: left; overflow: hidden">';
                    $message .= '<h4 style="text-align: center"><a href="'.url('/vacancies/'.$post->slug).'">'.$post->getTitle().'</a></h4>';
                    $message .= '<p style=" text-align: center">'.$post->monthlySalary().'</p>';
                    
                    $message .= '</div>';
            }
            $message .= '</div>';
            $message .= '</div>';
            
        }

        if(count($blogs) > 0)
        {
            $message .= '
            <div class="row" style="overflow: hidden; ">
            
            <h3 style="text-align:center"><strong>Latest Blogs from our Career Centre</strong></h3>

            
            ';
            $message .= '<div class="row">';
            for($i=0; $i<count($blogs); $i++)
            {
                $blog = $blogs[$i];
               
                    $message .= '<div style="width: 49%; margin-left: 1%; float: left; overflow: hidden">';
                    $message .= '<a href="'.url('/blog/'.$blog->slug).'"><h4 style="text-align: center">'.$blog->title.'</h4></a>';
                    $message .= '<i style="font-weight: strong; text-align: center"> By: '.$blog->user->name.' | '.Like::getCount('blog',$blog->id).' Likes | '.$blog->created_at->diffForHumans().'</i>';
                    
                $message .= '</a></div>';
            }
            $message .= '</div>';
            $message .= '</div>';
        }

        if(count($posts) > 0)
        {
            $message .= '
            <div class="row" style="overflow: hidden; ">
            <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
            <h3 style="text-align:center"><strong>Trending Vacancies on Emploi</strong></h3>

            <p style="text-align:center">Here are other trending vacancies on Emploi</p>';
            $message .= '<div class="row">';
            for($i=0; $i<count($posts); $i++)
            {
                $post = $posts[$i];
                
                    $message .= '<div style="width: 32%; margin-left: 1.33%; float: left; overflow: hidden">';
                    $message .= '<h4 style="text-align: center"><a href="'.url('/vacancies/'.$post->slug).'">'.$post->getTitle().'</a></h4>';
                    $message .= '<p style=" text-align: center">'.$post->monthlySalary().'</p>';
                    $message .= '</div>';
            }
            $message .= '</div>';
            $message .= '</div>';
        }


        

        return $message.'</div>';
    }

    public static function cleanString($string) {
       $string = str_replace(' ', '-', $string);

       return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

    public static function active($counter = 200)
    {
        return Post::where('status','active')->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->limit($counter)
                    ->get();                    
    }

    public function getTitle($len = false){
        if($len)
            return substr(ucwords(strtolower($this->title)), 0, 30);
        return ucwords(strtolower($this->title));
        
    }

    public function related($counter = 3){
        $counter = $counter < 1 ? 1 : $counter;
        $indId = $this->industry_id;
        $id = $this->id;
        $sql = "SELECT id FROM posts WHERE (industry_id = $indId AND status = 'active' AND id != $id) OR (featured = 1 AND id != $id) ORDER BY id DESC LIMIT $counter";
        $results = DB::select($sql);

        $posts = [];
        for ($i=0; $i < count($results); $i++) { 
            $posts[] = Post::find($results[$i]->id);
        }
        return $posts;

    }

    public function otherJobs($counter = 3){
        $counter = $counter < 1 ? 1 : $counter;
        $indId = $this->industry_id;
        $id = $this->id;
        $sql = "SELECT id FROM posts WHERE (industry_id = $indId AND status = 'active' AND id != $id) OR (featured = 1 AND id != $id) ORDER BY id DESC LIMIT $counter";
        $results = DB::select($sql);

        $posts = [];
        for ($i=0; $i < count($results); $i++) { 
            $posts[] = Post::find($results[$i]->id);
        }
         return $posts;

    }



    public function getShareTextAttribute(){
        $tit = explode(" ", $this->title);
        return implode("+", $tit).' '.$this->location->country->currency.' '.$this->monthly_salary;

        return '<a href= '.url('/login').">Login Here</a>";
       

    }
  
    public function getShareFacebookLinkAttribute(){
        return 'https://www.facebook.com/sharer.php?u='.url('/vacancies/'.$this->slug);
    }

    public function getShareTwitterLinkAttribute(){
        return 'https://twitter.com/share?url='.url('/vacancies/'.$this->slug).'&text='.$this->shareText.'&hashtags=Emploi'.$this->location->country->code;
    }

    public function getShareLinkedinLinkAttribute(){
        return 'http://www.linkedin.com/shareArticle?mini=true&url='.url('/vacancies/'.$this->slug);
    }

    public function getShareWhatsappLinkAttribute(){
       return "whatsapp://send?text=Apply for ".$this->title.' on Emploi. '.url('/vacancies/'.$this->slug);
    }

    public function getIsActiveAttribute(){
        $deadline = Carbon::parse($this->deadline);
        $today = Carbon::now();

        if($this->status == 'active' && $deadline > $today)
            return true;
        return false;
    }

    public function externalSimpleApply(){
        $string = $this->how_to_apply;
        $pattern = '/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i';
        preg_match_all($pattern, $string, $matches);
        if(count($matches[0]) > 0 && $this->featured == 'true')
            return $matches[0][0];
        return false;
    }



    public function modelSeeker(){
        return $this->hasOne(ModelSeeker::class);
    }

    public function educationLevel(){
        return $this->belongsTo(EducationLevel::class,'education_requirements');
    }

    public function hasModelSeeker(){
        if(isset($this->modelSeeker->id))
            return true;
        return false;
    }

    public function otherApplicants(){
        $ret = [];
        foreach ($this->applications as $k) {
            if(!$this->isSelected($k->user->seeker))
                array_push($ret, $k);
        }
        return $ret;
    }

    public function isSelected($seeker){

        foreach ($this->candidates as $k) {
            if($k->seeker_id == $seeker->id)
                return true;
        }
        return false;
    }

    public function plainMonthlySalary()
    {
        if(!isset($this->monthly_salary) || $this->monthly_salary == 0)
            return 'Salary is not disclosed';
        else
        {
            if(isset($this->max_salary))
            {
                $min = round($this->monthly_salary / 1000);
                $max = round($this->max_salary / 1000);

                return $this->location->country->currency.' '.$min.' - '.$max;
            }
            return $this->location->country->currency.' '.round($this->monthly_salary/1000);
        }
    }

    public function monthlySalary(){
        if(!isset($this->monthly_salary) || $this->monthly_salary == 0)
            return 'Salary is not disclosed';
        else
        {
            if(isset($this->max_salary))
            {
                $min = round($this->monthly_salary / 1000);
                $max = round($this->max_salary / 1000);

                return $this->location->country->currency.' '.$min.'k - '.$max.'k';
            }
            return $this->location->country->currency.' '.round($this->monthly_salary/1000).'k';
        }
    }

    public function getImageUrlAttribute(){
        if($this->image == null)
            return 'images/500g.png';
        return '/storage/images/logos/'.$this->image;
    }

    public function company(){
    	return $this->belongsTo(Company::class);
    }

    public function getUserAttribute(){
        return $this->company->user;
    }

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    public function postGroupJobs(){
        return $this->hasMany(PostGroupJob::class);
    }

    public function industry(){
    	return $this->belongsTo(Industry::class);
    }

    public function location(){
    	return $this->belongsTo(Location::class);
    }

    public function applications(){
        return $this->hasMany(JobApplication::class);
    }

    public function getShortlistedAttribute(){
        $applications = JobApplication::where('post_id',$this->id)
                    ->distinct('user_id')
                    ->where('status','shortlisted')
                    ->orderBy('id','DESC')
                    ->get();
        $applications = $applications->sortBy(function($application){
            return !$application->user->seeker->featured;
        });
        $applications = $applications->sortBy(function($application){
            return !$application->user->seeker->getRsi($application->post);
        });
        return $applications;
    }

    public function getToInterviewAttribute(){
        return JobApplication::where('post_id',$this->id)
                    ->distinct('user_id')
                    ->has('interview')
                    ->orderBy('id','DESC')
                    ->get();
    }

    public function getSelectedAttribute(){
        return JobApplication::where('post_id',$this->id)
                    ->distinct('user_id')
                    ->where('status','selected')
                    ->orderBy('id','DESC')
                    ->get();
    }

    public function getRejectedAttribute(){
        return JobApplication::where('post_id',$this->id)
                    ->distinct('user_id')
                    ->where('status','rejected')
                    ->orderBy('id','DESC')
                    ->get();
    }

    public function getUnrejectedAttribute(){
        return JobApplication::where('post_id',$this->id)
                    ->distinct('user_id')
                    ->where('status','active')
                    ->orderBy('id','DESC')
                    ->get();
    }

    public function isShortlisted($seeker){
        if(!$seeker->hasApplied($this))
            return false;
        $j = JobApplication::where('user_id',$seeker->user->id)->where('post_id',$this->id)->first();
        //dd( $j->status );
        if(isset($j->id) && $j->status == 'shortlisted')
        {
            //dd('gere');
            return true;
        }
        return false;
    }
    public function getCountryAttribute(){
        return $this->location->country;
    }

    public function vacancyType(){
    	return $this->belongsTo(VacancyType::class);
    }

    public function getDaysSinceAttribute(){
        $date = Carbon::parse($this->created_at);
        $now = Carbon::now();

        return $date->diffInDays($now);
    }


    public function getSinceAttribute(){
        return $this->created_at->diffForHumans();
        $date = Carbon::parse($this->created_at);
        $now = Carbon::now();

        return $date->diffInDays($now);
    }

    public function getBriefAttribute(){
        $peo = $this->positions == 1 ? 'person' : 'people';
        //$exp = /24;
        $exp = $this->experience_requirements > 12 ? round($this->experience_requirements/12).' years' : $this->experience_requirements.' months';
        return 'This position requires '.$this->positions." $peo with $exp experience. Ideal candidate should be located in ".$this->location->name." with a ".$exp." experience in ".$this->industry->name." industry. ".$this->monthlySalary();
    }

    public function getReadableDeadlineAttribute(){
        $date = Carbon::parse($this->deadline);
        return $date->isoFormat('MMM Do YYYY');
    }

    public static function featured($counter = 10){
        $posts = Post::where('featured','true')
                    //->where('status','active')
                    ->where('status','!=','inactive')
                    //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->orderBy('id','DESC')
                    ->limit($counter)
                    ->get();
                    

        return $posts;
    }

    public static function recent($counter = 10){
        return Post:://where('status','active')
                    //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    where('status','!=','inactive')
                    ->orderBy('id','DESC')
                    ->limit($counter)
                    ->get();
    }

    /**
     * Has many likes
     */
    public function savedPosts(){
        return $this->hasMany('App\UserSavedPost', 'post_id');
    }

    /**
     * Check if post is saved by user
     */
    public function savedByUser($userID){
        $post = $this->savedPosts->where('user_id', $userID)->first(); 
        return $post ? $post->status : false;
    }

    /**
     * Get the associated questions
     */
    public function Questions()
    {
        return $this->belongsToMany('App\Question', 'post_question');
    }

    /**
     * Get the jobseekers for a post
     */
    public function seekers()
    {
        return $this->applications->map(function($application){
            return $application->user->seeker;
        });
    }
}
