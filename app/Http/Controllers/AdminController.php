<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Blog;
use App\Company;
use App\Industry;
use App\Location;
use App\Post;
use App\Seeker;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function panel(Request $request){
    	return view('admins.index')
    			->with('admin',Auth::user());
    }

    public function posts(Request $request){
    	$query = isset($request->q) ? $request->q : "";
    	//dd($request->q);
    	$posts = Post::where('title','like',"%".$query."%")
    				->orderBy('created_at')
    				->paginate(5);
    	return view('admins.posts.index')
    			->with('posts',$posts)
    			->with('admin',Auth::user());
    }

    public function blog(Request $request){
        return view('admins.blog.index')
                ->with('blogs',Blog::orderBy('id','desc')->paginate(10));
    }

    public function updatePost($slug, Request $request)
    {
    	$post = Post::where('slug',$slug)->first();
    	if(!isset($post->id))
    		abort(404);
    	$post->status = $request->status;
    	$post->save();
    	return redirect()->back(); ;
    	return $request->all();
    }

    public function seekers($username=null, Request $request)
    {
        if($username)
        {
            $user = User::where('username',$username)->firstOrFail();
            if($user->role != 'seeker')
                return redirect('employers/'.$user->username);
            return view('admins.seekers.seeker')
                    ->with('seeker',$user->seeker);
        }
        if(isset($request->search))
        {
            $first = true;
            $location ="";
            if(isset($request->location))
            {
                if($first)
                {
                    $location = " location_id=".$request->location;
                    $first = false;
                }
                else
                {
                    $location = "AND location_id=".$request->location;
                }
                
            }
            $industry ="";
            if(isset($request->industry))
            {
                if($first)
                {
                    $industry = "industry_id=".$request->industry;
                    $first = false;
                }
                else
                {
                    $industry = "AND industry_id=".$request->industry;
                }
                
            }
            $gender ="";
            if(isset($request->gender))
            {
                if($first)
                {
                    $gender = "gender='".$request->gender."'";
                    $first = false;
                }
                else
                {
                    $gender = "AND gender=".$request->gender;
                }
                
            }

            $phone_number ="";
            if(isset($request->phone_number))
            {
                if($first)
                {
                    $phone_number = "phone_number LIKE '%".$request->phone_number."%'";
                    $first = false;
                }
                else
                {
                    $phone_number = "AND phone_number LIKE '%".$request->phone_number."%'";
                }
                
            }

            $keywords ="";
            if(isset($request->keywords))
            {
                if($first)
                {
                    $keywords = "education LIKE '%".$request->keywords."%' AND experience LIKE '%".$request->keywords."%'";
                    $first = false;
                }
                else
                {
                    $keywords = "AND education LIKE '%".$request->keywords."%' AND experience LIKE '%".$request->keywords."%'";
                }
                
            }

            if(!$first)
                $where = " WHERE ";
            else
                $where = "";
            $sql = "SELECT id FROM seekers $where $location $industry $gender $phone_number $keywords";
            $results = DB::select($sql);
            $seekers = [];
            for($i=0; $i<count($results); $i++)
            {
                array_push($seekers, Seeker::find($results[$i]->id));
            }

            if(isset($request->email))
            {
                $user = User::where('email',$request->email)->first();
                if(isset($user->id))
                {
                    $placed = false;
                    for($i=0; $i<count($seekers);$i++)
                    {
                        if($seekers[$i]->id == $user->seeker->id)
                        {
                            $placed = true;
                            break;
                        }
                    }
                    if(!$placed && $user->role == 'seeker')
                        array_push($seekers,$user->seeker);
                }
            }

            return view('admins.seekers.index')
                    ->with('industries',Industry::orderBy('name')->get())
                    ->with('locations',Location::orderBy('name')->get())
                    ->with('search',true)
                    ->with('location',$request->location)
                    ->with('industry',$request->industry)
                    ->with('gender',$request->gender)
                    ->with('phone_number',$request->phone_number)
                    ->with('keywords',$request->keywords)
                    ->with('email',$request->email)
                    ->with('seekers',$seekers);
        }
        return view('admins.seekers.index')
                    ->with('industries',Industry::orderBy('name')->get())
                    ->with('locations',Location::orderBy('name')->get())
                    ->with('seekers',Seeker::paginate(10));
        //show all seekers
    }

}
