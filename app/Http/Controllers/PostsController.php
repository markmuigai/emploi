<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Carbon\Carbon;

use App\Country;
use App\EducationLevel;
use App\Industry;
use App\Location;
use App\OldPost;
use App\Post;
use App\User;
use App\VacancyType;

use App\Jobs\EmailJob;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('employer', ['except' => [
            'index','show','apply'
        ]]);
    }

    public function apply(Request $request, $slug)
    {
        if(!isset(Auth::user()->id))
            return redirect('/login');
        if(Auth::user()->role != 'seeker')
            return abort(405);
        if(!Auth::user()->seeker->hasCompletedProfile())
            return view('seekers.update-profile');
        $post = Post::where('slug',$slug)
                ->firstOrFail();
        return view('seekers.apply')
                ->with('user',Auth::user())
                ->with('post',$post);
        return 'application';
    }



    public function index(Request $request)
    {
        $title = 'Latest Vacancies';
        $query = isset($request->q) ? $request->q : "";
        $posts = Post::where('status','active')
            ->where('deadline','>',Carbon::now()->format('Y-m-d'))
            ->orderBy('featured','DESC')
            ->orderBy('created_at','DESC')
            ->paginate(10)->onEachSide(3);
        return view('seekers.vacancies')
                ->with('industries',Industry::active())
                ->with('locations',Location::active())
                ->with('vacancyTypes',VacancyType::all())
                ->with('title',$title)
                ->with('posts',$posts);
    }

    public function create()
    {
        $user = Auth::user();

        if(count($user->companies) == 0)
        {
            return redirect('/companies/create');
        }

        return view('jobs.create')
                ->with('companies',$user->companies)
                ->with('locations',Location::active())
                ->with('countries',Country::active())
                ->with('industries',Industry::active())
                ->with('educationLevels',EducationLevel::all())
                ->with('vacancyTypes',VacancyType::all())
                ->with('user',$user);
    }

    public function store(Request $request)
    {
        //return $request->all();
        if(isset($request->image))
        {
            $storage_path = '/public/images/logos';
            $image_url = basename(Storage::put($storage_path, $request->image));
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
            'deadline' => Carbon::now()->add(3,'weeks'),
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
            $caption = $p->title." Job Post Request Placed";
            $contents = "
            The job post <b>".$p->title."</b> has been created succesfully on Emploi.
            <br> Here is your tracking code: <b>".$p->slug."</b>. <br><br>
            The listing will be made available after verification by our administrators.
            <br>
            <a class='btn btn-sm btn-primary' href='".url('/vacancies/create')."'>Create Advert</a>.
            ";
            EmailJob::dispatch($p->company->user->name, $p->company->user->email, $p->title.' Post on Emploi', $caption, $contents);

            $caption = $p->title." Job Post Request Placed";
            $contents = "
            The job post <b>".$p->title."</b> has been created on Emploi and approval is required.
            <br><br>
            Click <a href='".url('/admin/posts')."'>here </a> to review job post.
            ";
            EmailJob::dispatch('Emploi Admin', 'info@emploi.co', $p->title.' on Emploi', $caption, $contents);

            return view('jobs.saved')
                ->with('title','Job Advert Created Succesfully')
                ->with('message','The Job Advertisement has been created succesfully. <br> Here is your tracking code: <b>'.$p->slug.'</b>. <br><br>
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
        $posts = Post::where('status','active')->where('deadline','>',Carbon::now()->format('Y-m-d'))->limit(25)->paginate(10);
        $match = false;

        if($param == 'featured'){ //featured jobs
            $posts = Post::where('featured','true')->where('status','active')->paginate(10)->onEachSide(3);
            $title = 'Featured Jobs';
            $match = true;
        }
        foreach(VacancyType::all() as $v){ //vacancy type jobs
            if($v->slug == $param)
            {
                $posts = Post::where('vacancy_type_id',$v->id)
                        ->where('status','active')
                        ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        ->paginate(10)
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
                $posts = Post::where('status','active')
                        ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        ->whereIn('location_id', $l)
                        ->paginate(10)
                        ->onEachSide(3);

                $title =  'Jobs in '.$c->name;
                $match = true;
                break;
            }
        }
        foreach(Location::active() as $c){ //location jobs
            if(strtolower($c->name) == strtolower($param))
            {
                $posts = Post::where('status','active')
                        ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        ->where('location_id', $c->id)
                        ->paginate(10)
                        ->onEachSide(3);
                $title = 'Jobs near '.$c->name.' ['.$c->country->code.']';
                $match = true;
                break;
            }
        }
        foreach(Industry::active() as $c){ //industry jobs
            if(strtolower($c->slug) == strtolower($param))
            {
                $posts = Post::where('status','active')
                        ->where('deadline','>',Carbon::now()->format('Y-m-d'))
                        ->where('industry_id', $c->id)
                        ->paginate(10)
                        ->onEachSide(3);
                $title = $c->name.' Jobs';
                $match = true;
                break;
            }
        }

        if($param == 'search')
        {
            $params = "";
            if(isset($request->location))
            {
                $location = Location::find($request->location);
                if(isset($location->id))
                {
                    $params .= "AND location_id = ".$location->id;
                }
            }
            if(isset($request->vacancyType))
            {
                $vt = VacancyType::find($request->vacancyType);
                if(isset($vt->id))
                {

                    $params .= "AND vacancy_type_id = ".$vt->id;
                }
            }

            if(isset($request->industry))
            {
                $ind = Industry::find($request->industry);
                if(isset($ind->id))
                {
                    $params .= " AND industry_id = ".$ind->id;
                }
            }

            if(isset($request->q))
            {
                //$str = $params == "" ? "WHERE title like \"%".$request->q."%\"" : ", title like \"%".$request->q."%\"";
                //$params .= $str;
                //
                $params .= " AND title like \"%".$request->q."%\"";
            }
            $params .= " AND deadline > ".Carbon::now()->format('Y-m-d');
            //sort
            $sql = "SELECT id FROM posts WHERE status = 'active' $params ORDER BY featured, deadline DESC Limit 20";
            //dd($sql);
            $result = DB::select($sql);
            $posts = [];
            foreach(DB::select($sql) as $post)
            {
                $post = Post::findOrFail($post->id);
                array_push($posts, $post);
            }
            return view('seekers.vacancies')
                    ->with('industries',$industries)
                    ->with('locations',$locations)
                    ->with('vacancyTypes',$vacancyTypes)
                    ->with('title',$title)
                    ->with('search',true)
                    ->with('posts',$posts)
                    ->with('noLinks',true);
        }

        if($match)
        {
            return view('seekers.vacancies')
                        ->with('industries',$industries)
                        ->with('locations',$locations)
                        ->with('vacancyTypes',$vacancyTypes)
                        ->with('title',$title)
                        ->with('posts',$posts);
            return $posts;
        }



        $post = Post::where('slug',$param)->where('status','active')->where('deadline','>',Carbon::now()->format('Y-m-d'))->first();

        if(isset($post->id))
        {
            return view('seekers.vacancy')
                ->with('post',$post);
        }

        $post = OldPost::where('slug',$param)->where('category','vacancies')->firstOrFail();
        return view('seekers.vacancy-old')
                ->with('post',$post);

        
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
        $user = Auth::user();
        $post = Post::where('slug',$slug)->firstOrFail();
        if($post->company->user->id != $user->id)
            abort(403);
        if(isset($request->image))
        {

            $storage_path = '/public/images/logos';
            $post->image = basename(Storage::put($storage_path, $request->image));
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
}
