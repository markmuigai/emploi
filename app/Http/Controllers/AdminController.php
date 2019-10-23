<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Blog;
use App\Company;
use App\Post;

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

}
