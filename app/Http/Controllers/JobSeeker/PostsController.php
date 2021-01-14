<?php

namespace App\Http\Controllers\JobSeeker;


use Auth;
use Image;
use Storage;
use App\Post;
use App\User;
use App\Company;
use App\Country;
use Notification;
use Carbon\Carbon;
use App\Employer;
use App\Industry;
use App\Location;
use App\ModelSeeker;
use App\PostGroup;
use App\SearchedKey;
use App\VacancyType;
use App\IndustrySkill;
use App\Jobs\EmailJob;
use App\EducationLevel;
use App\ModelSeekerSkill;
use Illuminate\Http\Request;
use App\Notifications\PostEdited;
use App\Notifications\PostCreated;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('employer', ['except' => [
            'index','show','apply'
        ]]);
    }

    public function apply(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)
                ->firstOrFail();
        $user = Auth::user();
        if(!isset($user->id))
            return redirect('/login');
        if($user->role != 'seeker')
            return abort(405);
        if(!$user->seeker->hasCompletedProfile())
        {
            $request->session()->put('redirectToPost', $post->slug);
            return view('seekers.update-profile');
        }
        
        return view('seekers.apply')
                ->with('user',$user)
                ->with('post',$post);
        return 'application';
    }



    public function index(Request $request)
    {
        // Get recommended jobs
        if(auth()->user() && auth()->user()->role == 'seeker'){
            $query = auth()->user()->seeker->recommendedPosts();

            if(!empty($query)){
                $recommendedJobs = $query->get()->pluck('id');
            }
        }elseif(!empty($request->parameters)){
            $recommendedJobs = Post::where('industry_id', $request->parameters['industry'])
                            ->orWhere('location_id', $request->parameters['location'])
                            ->get()->pluck('id');
        }else{
            $recommendedJobs = collect();
        }

        $title = "Latest Vacancies in \t" .date("F, Y");
        $query = isset($request->q) ? $request->q : "";
        $posts = Post::whereRaw("UPPER('title') != '". strtoupper('HOW TO APPLY')."'")
            ->where('status','active')
            ->orderBy('featured', 'DESC')
            ->orderBy('created_at','DESC')
            ->paginate(27)->onEachSide(3);
        return view('v2.seekers.vacancies',[
            'industries' => Industry::active(),
            'locations' => Location::active(),
            'vacancyTypes' => VacancyType::all(),
            'title' => $title,
            'posts' => $posts,
            'educationLevels' => EducationLevel::all(),
            'recommendedJobs' => $recommendedJobs
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        $companies = Company::where('user_id',$user->id)->orderBy('name')->get();
        $locations =Location::Where('status','active')->orderBy('country_id')->get();

        if(count($companies) == 0)
        {
            return redirect('/companies/create');
        }
        $skills =  IndustrySkill::all();
        return view('jobs.create')
                ->with('companies',$companies)
                ->with('locations',$locations)
                ->with('countries',Country::active())
                ->with('industries',Industry::active())
                ->with('educationLevels',EducationLevel::all())
                ->with('vacancyTypes',VacancyType::all())
                ->with('skills',$skills)
                ->with('user',$user);
    }

    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'image'    =>  ['mimes:png,jpg,jpeg','max:51200']
        ]);
        if(isset($request->image))
        {
            $image = $request->file('image');
            $image_url = time() . '.' . $image->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/images/logos/'.$image_url;
            $watermark = Image::make(public_path('/images/logo.png'));   
            // $featured_image_url = basename(Storage::put($storage_path, $request->featured_image));

            Image::make($image)->resize(900, 600)->insert($watermark, 'bottom-right', 50, 50)->save($storage_path);

            // $storage_path = '/public/images/logos';
            // $image_url = basename(Storage::put($storage_path, $request->image));
        }
        else
        {
            $image_url = "";
        }

        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->title));
        $slug = preg_replace("/[^ \w]+/", "", strtolower($request->title));
        $slug = explode(" ", $slug);
        $slug = implode("-", $slug);

        $post = Post::where('slug',$slug)->first();
        if(isset($post->id))
        {
            $slug= $slug.'-'.strtolower(User::generateRandomString(4));
        }

        $p = Post::create([
            'slug' =>$slug,
            'company_id' => $request->company,
            'title' => $request->title,
            'industry_id' => $request->industry,
            'education_requirements' => $request->education,
            'experience_requirements' => $request->experience,
            'responsibilities' => $request->responsibilities,
            'benefits' => $request->benefits,
            'deadline' => Carbon::now()->add(4,'weeks'),
            'status' => 'inactive',
            'positions' => $request->positions,
            'location_id' => $request->location,
            'vacancy_type_id'=> $request->vacancyType,
            'how_to_apply' => $request->how_to_apply,
            'monthly_salary' => $request->monthly_salary,
            'max_salary' => $request->max_salary,
            'image' => $image_url
        ]);

        if(isset($p->id))
        {
            $m = ModelSeeker::create([
                'post_id' => $p->id,
                'education_level_id' => 4,
                'education_level_importance' => 50,
                'personality_test_id' => 3,
                'experience_duration' => 2,
                'experience_level_importance' => 50,
                'iq_test' => false,
                'iq_score' => 70,
                'interview' => true,
                'interview_result_score' => 70,
                'psychometric' =>  false,
                'psychometric_test_score' => 50,
                'company_size_id' => 2

            ]);

            $m->other_skills = '[]';
            $m->other_skills_weight = '[]';

            if(isset($request->other_skill_name))
            {
                $m->other_skills = $request->other_skill_name;
                $m->other_skills_weight = $request->other_skill_weight;
            }

            $m->save();

            if(isset($request->skill_id) && count($request->skill_id) > 0 )
            {
                $counter = 0;
                foreach ($request->skill_id as $e) {
                    ModelSeekerSkill::create([
                        'model_seeker_id' => $m->id,
                        'industrySkill_id' => $e,
                        'weight' => $request->skill_weight[$counter]
                    ]);
                    $counter ++;
                }
            }


            if (app()->environment() === 'production')
            {
                $caption = $p->title." Job Post Request Placed";
                $contents = "
                The job post <b>".$p->title."</b> has been created successfully on Emploi.
                <br> Here is your tracking code: <b>".$p->slug."</b>. <br><br>
                The listing will be made available after verification by our administrators.
                <br>
                <a class='btn btn-sm btn-primary' href='".url('/vacancies/create')."'>Create Advert</a>.
                ";

                // $email = $p->company->user->email == 'jobs@emploi.co' ? 'jobapplication389@gmail.com' : $p->company->email;

                // $email = $email = null ? $p->company->user->email : $email;

                $email = $p->company->user->email;
                if($email != 'jobs@emploi.co')
                    EmailJob::dispatch($p->company->user->name, $email, $p->title.' Post on Emploi', $caption, $contents);

                Notification::send(Employer::first(),new PostCreated('NEW JOB POST: '.$p->title.' created under Company '.$p->company->name.' by '.$p->company->user->name));

                $caption = $p->title." Job Post Request Placed";
                $contents = "
                The job post <b>".$p->title."</b> has been created on Emploi and approval is required.
                <br><br>
                Click <a href='".url('/admin/posts')."'>here </a> to review job post.
                ";
                EmailJob::dispatch('Emploi Admin', 'jobapplication389@gmail.com', $p->title.' on Emploi', $caption, $contents);
            }


            

            return view('jobs.saved')
                ->with('title','Job Advert Created Successfully')
                ->with('message','The Job Advertisement has been created successfully. <br> Here is your tracking code: <b>'.$p->slug.'</b>. <br><br>
                    The listing will be made available after verification by our administrators.

                    <br>
                    <a class="btn btn-sm btn-primary" href="/vacancies/create">Create Advert</a> <a href="/contact" class="btn btn-sm btn-success">Contact Us</a>');
        }
        else
        {
            return view('jobs.saved')
                ->with('title','Job Advert Creation Failed')
                ->with('message','The Job Advertisement has NOT been created. <br> This may have  been caused by errors during input stage. <br><br>
                    Please try again later

                    <br>
                    <a class="btn btn-sm btn-primary" href="/vacancies/create">Create Advert</a> <a href="/contact" class="btn btn-sm btn-success">Contact Us</a>');
        }



        //dd($p);
        //
    }

    public function show($param, Request $request)
    {
        $industries = Industry::active();
        $locations = Location::active();
        $vacancyTypes = VacancyType::all();
        $title = 'Featured Jobs';
        //$posts = Post::where('status','active')->where('deadline','>',Carbon::now()->format('Y-m-d'))->limit(25)->paginate(10);
        //$posts = Post::limit(25)->paginate(10);
        $posts = Post::whereRaw("UPPER('title') != '". strtoupper('HOW TO APPLY')."'")
                ->orderBy('featured','DESC')
                ->orderBy('created_at','DESC')
                ->limit(90)
                ->paginate(15);
        
        $match = false;

        if($param == 'featured'){ //featured jobs
            $posts = Post::where('featured','true')
                    ->where('status','!=','inactive')
                    ->orderBy('created_at','DESC')
                    ->paginate(30)
                    ->onEachSide(3);
            $title = 'Featured Jobs';
            $match = true;
        }
        foreach(VacancyType::all() as $v){ //vacancy type jobs
            if($v->slug == $param)
            {
                $posts = Post::where('vacancy_type_id',$v->id)
                        //->where('status','active')
                        ->where('status','!=','inactive')
                        //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        ->whereRaw("UPPER('title') != '". strtoupper('HOW TO APPLY')."'")
                        ->orderBy('featured','DESC')
                        ->orderBy('created_at','DESC')
                        ->paginate(15)
                        ->onEachSide(3);
                $title = $v->name.' Jobs';
                $match = true;
                break;
            }
        }
        foreach(Country::active() as $c){ //country jobs
            if(strtolower($c->name) == strtolower($param))
            {
                $locations = Country::getActiveLocations($c->id);
                $l = [];
                foreach($locations as $j)
                {
                    $l[count($l)] = $j->id;
                }
                $posts = Post::whereIn('location_id',$l)
                        //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        ->where('status','!=','inactive')
                        ->whereRaw("UPPER('title') != '". strtoupper('HOW TO APPLY')."'")
                        ->orderBy('featured','DESC')
                        ->orderBy('created_at','DESC')
                        ->paginate(15)
                        ->onEachSide(3);

                $title =  'Jobs in '.$c->name;
                $match = true;
                break;
            }
        }
        foreach(Location::active() as $c){ //location jobs
            if(strtolower($c->name) == strtolower($param))
            {
                $posts = Post::where('location_id',$c->id)
                        //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        //->where('location_id', $c->id)
                        ->where('status','!=','inactive')
                        ->whereRaw("UPPER('title') != '". strtoupper('HOW TO APPLY')."'")
                        ->orderBy('featured','DESC')
                        ->orderBy('created_at','DESC')
                        ->paginate(15)
                        ->onEachSide(3);
                $title = 'Jobs near '.$c->name.' ['.$c->country->code.']';
                $match = true;
                break;
            }
        }
        foreach(Industry::active() as $c){ //industry jobs
            if(strtolower($c->slug) == strtolower($param))
            {
                $posts = Post::where('industry_id',$c->id)
                        //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        //->where('industry_id', $c->id)
                        ->where('status','!=','inactive')
                        ->whereRaw("UPPER('title') != '". strtoupper('HOW TO APPLY')."'")
                        ->orderBy('featured','DESC')
                        ->orderBy('created_at','DESC')
                        ->paginate(15)
                        ->onEachSide(3);
                $title = $c->name.' Jobs';
                $match = true;
                break;
            }
        }

        if($param == 'search')
        {
            $title = 'Search Vacancies';
            $params = "";

            $search_location = false;
            $search_vtype = false;
            $search_ind = false;
            $search_query = false;

            $user_id = isset(Auth::user()->id) ? Auth::user()->id : null;

            $searchedKey = SearchedKey::create([
                'keywords' => isset($request->q) ? $request->q : '-BLANK-SEARCH-',
                'user_id' => $user_id,
                'domain' => $request->getHttpHost()
            ]);

            if(isset($request->location))
            {
                $location = Location::find($request->location);
                if(isset($location->id))
                {
                    $search_location = $location->id;
                    $params .= "AND location_id = ".$location->id." ";
                    $searchedKey->location_id = $location->id;
                }
            }
            if(isset($request->vacancyType))
            {
                $vt = VacancyType::find($request->vacancyType);
                if(isset($vt->id))
                {
                    $search_vtype = $vt->id;
                    $params .= "AND vacancy_type_id = ".$vt->id." ";
                    $searchedKey->vacancy_type_id = $vt->id;
                }
            }

            if(isset($request->industry))
            {
                $ind = Industry::find($request->industry);
                if(isset($ind->id))
                {
                    $search_ind = $ind->id;
                    $params .= " AND industry_id = ".$ind->id." ";
                    $searchedKey->industry_id = $ind->id;
                }
            }

            if(isset($request->position))
            {  
               {
                    $search_pos = $request->position;
                    $params .= " AND positions = ".$request->position." ";
                }
            }

            if(isset($request->educationLevel))
            {   
               {
                    $search_el = $request->educationLevel;
                    $params .= " AND education_requirements = ".$request->educationLevel." ";
                }
            }

            if(isset($request->experience))
            {
               {
                    $search_exp = $request->experience;
                    $params .= " AND experience_requirements = ".$request->experience." ";
                }
            }

            if(isset($request->q))
            {
                //$str = $params == "" ? "WHERE title like \"%".$request->q."%\"" : ", title like \"%".$request->q."%\"";
                //$params .= $str;
                //
                $search_query = $request->q;
                $params .= " AND (title like '%".$request->q."%'  OR responsibilities like '%".$request->q."%')";
            }
            $searchedKey->save();
            //$params .= " AND deadline > ".Carbon::now()->format('Y-m-d');
            //sort
            $sql = "SELECT * FROM posts WHERE id > 0 $params AND UPPER('title') != 'HOW TO APPLY' AND status != 'inactive' ORDER BY created_at DESC Limit 30";
            //dd($sql);
            //$result = DB::select($sql);

            $posts = [];
            $results = DB::select($sql);
            
            for($i=0; $i<count($results); $i++)
                $posts[] = Post::findOrFail($results[$i]->id);


                // Get recommended jobs
            if(auth()->user() && auth()->user()->role == 'seeker'){
                $query = auth()->user()->seeker->recommendedPosts();

                if(!empty($query)){
                    $recommendedJobs = $query->get()->pluck('id');
                }
            }elseif(!empty($request->parameters)){
                $recommendedJobs = Post::where('industry_id', $request->parameters['industry'])
                                ->orWhere('location_id', $request->parameters['location'])
                                ->get()->pluck('id');
            }else{
                $recommendedJobs = collect();
            }

            return view('v2.seekers.vacancies')
                    ->with('industries',$industries)
                    ->with('locations',$locations)
                    ->with('vacancyTypes',$vacancyTypes)
                    ->with('title',$title)
                    ->with('search',true)
                    ->with('posts',$posts)
                    ->with('noLinks',true)
                    ->with('search_location',$search_location)
                    ->with('search_vtype',$search_vtype)
                    ->with('search_ind',$search_ind)
                    ->with('search_query',$search_query)
                    ->with('educationLevels',EducationLevel::all())
                    ->with('recommendedJobs', $recommendedJobs);
        }

        if($match)
        {

            // Get recommended jobs
            if(auth()->user() && auth()->user()->role == 'seeker'){
                $query = auth()->user()->seeker->recommendedPosts();

                if(!empty($query)){
                    $recommendedJobs = $query->get()->pluck('id');
                }
            }elseif(!empty($request->parameters)){
                $recommendedJobs = Post::where('industry_id', $request->parameters['industry'])
                                ->orWhere('location_id', $request->parameters['location'])
                                ->get()->pluck('id');
            }else{
                $recommendedJobs = collect();
            }

            return view('v2.seekers.vacancies')
                    ->with('industries',$industries)
                    ->with('locations',$locations)
                    ->with('vacancyTypes',$vacancyTypes)
                    ->with('title',$title)
            
                    ->with('posts',$posts)
                    
                    ->with('educationLevels',EducationLevel::all())
                    ->with('recommendedJobs', $recommendedJobs);
                    
            // return view('v2.seekers.vacancies')
            //             ->with('industries',$industries)
            //             ->with('locations',$locations)
            //             ->with('vacancyTypes',$vacancyTypes)
            //             ->with('title',$title)
            //             ->with('posts',$posts);
        }



        $post = Post::where('slug',$param)
                    //->where('status','active')
                    ->where('status','!=','inactive')
                    //->where('deadline','>',Carbon::now()->format('Y-m-d'))
                    ->first();

        if(isset($post->id))
        {
            return view('seekers.vacancy')
                ->with('post',$post);
        }
            
        $pg = PostGroup::where('slug',$param)->firstOrFail();
        return view('admins.postGroup.show')
                ->with('postGroup',$pg);

        

        // if(isset($post->id))
        // {
        //     return view('seekers.vacancy')
        //         ->with('post',$post);
        // }

        // $post = OldPost::where('slug',$param)->where('category','vacancies')->firstOrFail();
        // return view('seekers.vacancy-old')
        //         ->with('post',$post);

        
    }

    public function edit($slug)
    {
        $user = Auth::user();
        $post = Post::where('slug',$slug)->firstOrFail();
        if($post->company->user->id != $user->id)
            abort(403);
        return view('jobs.edit')
                ->with('companies',$user->companies)
                ->with('industries',Industry::active())
                ->with('vacancyTypes',VacancyType::all())
                ->with('educationLevels',EducationLevel::all())
                ->with('locations',Location::active())
                ->with('post',$post);
        return 'edit';
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'image'    =>  ['mimes:png,jpg,jpeg','max:51200']
        ]);
        $user = Auth::user();
        $post = Post::where('slug',$slug)->firstOrFail();
        if($post->company->user->id != $user->id)
            abort(403);
        if(isset($request->image))
        {
            $image = $request->file('image');
            $image_url = time() . '.' . $image->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/images/logos/'.$image_url;
            $watermark = Image::make(public_path('/images/logo.png'));   
            // $featured_image_url = basename(Storage::put($storage_path, $request->featured_image));

            Image::make($image)->resize(900, 600)->insert($watermark, 'bottom-right', 50, 50)->save($storage_path);

            $oldImage = storage_path().'/app/public/images/logos/'.$post->image;

            if(file_exists($oldImage))
                unset($oldImage);

            //$storage_path = '/public/images/logos';
            $post->image = $image_url;
        }
        else
        {
            $post->image = null;
        }
        $post->title = $request->title;
        $post->industry_id = $request->industry;
        $post->vacancy_type_id = $request->vacancyType;
        $post->responsibilities = $request->responsibilities;
        $post->education_requirements = $request->education;
        $post->experience_requirements = $request->experience;
        $post->positions = $request->positions;
        $post->location_id = $request->location;
        $post->deadline = $request->deadline;
        $post->monthly_salary = $request->monthly_salary;
        $post->max_salary = $request->max_salary;
        $post->how_to_apply = $request->how_to_apply;
        $post->save();

        if (app()->environment() === 'production'){
        Notification::send(Employer::first(),new PostEdited('JOB POST EDITED: '.$post->title.' was edited by '.$post->company->user->name.' for Company '.$post->company->name));
        }
        if($post->status == 'active')
            return redirect('/vacancies/'.$post->slug);
        return redirect('/employers/applications/'.$post->slug);
        //return $request->all();
    }

    public function destroy($id)
    {
        //
    }

    public function activate(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)
                ->firstOrFail();
        $access = false;
        if(Auth::user()->role == 'admin')
            $access = true;
        if(Auth::user()->id == $post->user->id)
            $access = true;
        if(!$access)
            abort(403);
        if($post->status == 'closed')
        {
            $post->status = 'active';
            $post->save();
        }
        return redirect()->back();
    }

    public function deactivate(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)
                ->firstOrFail();
        $access = false;
        if(Auth::user()->role == 'admin')
            $access = true;
        if(Auth::user()->id == $post->user->id)
            $access = true;
        if(!$access)
            abort(403);
        if($post->status == 'active')
        {
            $post->status = 'closed';
            $post->save();
        }
        return redirect()->back();
    }

    /**
     * Filter recommended jobs
     */
    public function getRecommendedParameters()
    {
        // dd($request->all());
        return redirect()->route('vacancies.index',[
            'recommendedParameters' => $request->all()
        ]);
    }

}