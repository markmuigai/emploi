<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Blog;
use App\Country;
use App\EducationLevel;
use App\Industry;
use App\JobApplication;
use App\Location;
use App\Post;
use App\VacancyType;

class SeekerController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('seekers.dashboard')
            ->with('posts',Auth::user()->seeker->featuredPosts())
            ->with('blogs',Blog::recent(20));
    }

    public function toProfile(){
        return redirect('/profile');
    }

    public function applications(Request $request, $id = null)
    {
    	$user = Auth::user();
    	if(!$id)
    	{
    		return view('seekers.applications')
    				->with('user',$user);
    	}
    	else
    	{
    		$app = JobApplication::findOrFail($id);

    		if($app->user_id != $user->id)
    			abort(403);
    		return view('seekers.application')
    				->with('app',$app)
    				->with('user',$user);
    	}
    	return 'application';
    }

    public function feed(Request $request){
        $ret = array();
        if(isset($request->initial)){

            $jobs = Post::recent(5);
            for($i=0; $i<count($jobs); $i++)
            {
                $j = $jobs[$i];
                $el = ['job', $j, $j->company, $j->industry, $j->location, $j->location->country, $j->vacancyType, $j->educationLevel];
                array_push($ret, $el);
            }

            $blogs = Blog::recent(3);
            for($i=0; $i<count($blogs); $i++)
            {
                $b = $blogs[$i];
                $el = ['blog',$b,$b->user,$b->category];
                array_push($ret, $el);
            }
        }
        else
        {
            $str = "WHERE id NOT IN 4";

            // for($i=0; $i<count($request->blogs); $i++)
            // {
            //     $b = $request->blogs[$i];
            //     if($i==0)
            //         $str .= " WHERE id != $b";
            //     else
            //         $str .= ", WHERE id != $b";
            // }
            $sql = "SELECT id FROM posts $str ORDER BY id DESC LIMIT 5";
            return DB::select($sql);
            return $sql;
            //return blogs [3] and jobs [5] not received
            //sort by date

            return $request->all();
        }
        return $ret;        
    }
}
