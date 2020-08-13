<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Company;
use App\Like;
use App\Post;
use App\Seeker;
use App\SeekerSubscription;
use App\EmployerSubscription;
use App\Task;

class ApiController extends Controller
{
    public function getTotalJobs(Request $request)
    {
    	return count(Post::all());

    }

    public function totalJpaasSub(Request $request){
        return count(SeekerSubscription::all());
    }

    
    public function totalEpaasSub(Request $request){
        return count(EmployerSubscription::all());
    }

    public function totalTasks(Request $request){
        return count(Task::all());
    }


    public function getTotalCandidates(Request $request)
    {
    	return count(Seeker::all()) * 2;
    	
    }

    public function getTotalCompanies(Request $request)
    {
    	return count(Company::all()) * 3;
    }

    public function getTotalHiringCompanies(Request $request)
    {
    	return count(Company::getHiringCompanies2(0)) * 3;
    }

    public function getSeekersWhoFoundTheirWay(Request $request)
    {
        return round(count(Seeker::all())*0.1);
    }

    public function getLatestBlogs(Request $request)
    {
        $counter = 5;
        if(isset($request->count))
            $counter = $request->count;
        $blogs =  Blog::orderBy('created_at', 'DESC')->limit($counter)->get();
        $retVal = [];
        for($i=0; $i<count($blogs); $i++)
        {
            $blog = $blogs[$i];

            $likes = Like::getCount('blog',$blog->id);
            $likes = $likes == 1 ? $likes.' Like' : $likes.' Likes';

            $b = [];
            $b['id'] = $blog->id;
            $b['title'] = $blog->title;
            $b['slug'] = $blog->slug;
            $b['imageUrl'] = $blog->imageUrl;
            $b['category'] = $blog->category->name;
            $b['user_name'] = $blog->user->name;
            $b['created_at'] = $blog->created_at->diffForHumans();
            $b['likes'] = $likes;
            $b['longPreview'] = html_entity_decode($blog->longPreview(250));


            array_push($retVal, $b);
        }
        return $retVal;
        //name
        //slug
        //author
        //diffForHumans
        //likes
        //preview

        return round(count(Seeker::all())*0.1);
    }
    
}
