<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\JobApplication;

class ShortlistSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();

        if($post->company->user_id != auth()->user()->id)
            return abort(403);

        return view('v2.employers.applications.shortlisted')
        ->with('pool',$post->shortlisted)
        ->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  $slug, $username)

    {
        $user = User::where('username',$username)->firstOrFail();
        $post = Post::where('slug',$slug)->firstOrFail();
        if($user->seeker->hasApplied($post))
        {
            $j = JobApplication::where('user_id',$user->id)->where('post_id',$post->id)->firstOrFail();
            if($j->status == 'shortlisted')
            {
                $j->status = 'active';
                $j->save();
            }
            else
            {
                if($j->status = 'active')
                {
                    $j->status = 'shortlisted';
                    $j->save();
                }

            }

        return redirect('/v2/employers/applications/'.$post->slug);
        return view('v2.employers.dashboard.message')
            ->with('title','An Error Occurred')
            ->with('message','An error occurred while processing your request. Please try again later');
        }

         
       else{ 
        $job = JobApplication::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'cover' => 'Shortlisted by employer',
            'status' => 'shortlisted'
        ]);
        }
     
            return view('employers.dashboard.message')
                    ->with('title','Shortlist Success')
                    ->with('message',$user->seeker->public_name.' has been shortlisted for the '.$post->title.' position.');     

   
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
