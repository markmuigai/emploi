<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use App\User;
use App\Seeker;
use App\Candidate;
use Carbon\Carbon;
use App\Jobs\EmailJob;
use App\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelectCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index(Request $request, $slug){
        $post = Post::where('slug',request()->slug)->firstOrFail();

        if($post->company->user_id != auth()->user()->id)
            return abort(403);

        return view('v2.employers.selection.index')
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
    public function store(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        $c = Candidate::create([
            'seeker_id' => $request->seeker_id,
            'post_id' => $post->id,
            'monthly_salary' => $request->monthly_salary
        ]);

        $seeker = Seeker::findOrFail($request->seeker_id);

        $j = JobApplication::where('user_id',$seeker->user->id)
                ->where('post_id',$post->id)
                ->first();

        $j->status = 'selected';
        $j->save();

        $caption = "Candidate Selected ".$post->title;
        $contents = "You have selected ".$c->seeker->user->name." for the position of ".$post->title." with a monthly salary of ".$post->location->country->currency.$c->monthly_salary.". <br>
        <b>Candidate Details</b> <br>
        Name: ".$c->seeker->user->name." <br>
        Email: ".$c->seeker->user->email." <br>
        Phone: ".$c->seeker->phone_number." <br>.
        <br>
        Thank you for choosing Emploi.
        <br><br>

        <a href='".url('/vacancies/create')."'>Advertise Vacancy</a>
        ";

        EmailJob::dispatch($post->company->user->name, $post->company->user->email, $c->seeker->public_name." for ".$post->title, $caption, $contents);

        $caption = "Application for the ".$post->title." position was successful";
        $contents = "You have been selected for <b>".$post->title."</b> position at <b>".$post->company->name."</b>. You have been offered a <b>monthly salary of ".$post->location->country->currency.$c->monthly_salary."</b>. <br>
        <b>Employer Details</b> <br>
        Name: ".$post->company->user->name." <br>
        Email: ".$post->company->user->email." <br>
        <br>
        One of <a href='".url('/companies/'.$post->company->id)."'>".$post->company->name."</a>'s representative will get in touch with you for additional details on this position.
        <br>
        Thank you for choosing Emploi.
        <br>
        ";
        EmailJob::dispatch($c->seeker->user->name, $c->seeker->user->email, "Application for ".$post->title." Successful", $caption, $contents);

        $caption = "The position ".$post->title." has been closed, ".$c->seeker->user->name." selected";
        $contents = $c->seeker->user->name." has been selected by <a href='".url('/companies/'.$post->company->id)."'> for the <b>".$post->title."</b> position, and has been offered a  <b>monthly salary of ".$post->location->country->currency.$c->monthly_salary."</b>. <br>
        <b>Employer Details</b> <br>
        Name: ".$post->company->user->name." <br>
        Email: ".$post->company->user->email." <br>
        <br>
        <b>Job Seeker Details</b> <br>
        Name: ".$c->seeker->user->name." <br>
        Email: ".$c->seeker->user->email." <br>
        Phone: ".$c->seeker->phone_number." <br>.
        <br>
        ";
        EmailJob::dispatch('Emploi Admin', 'jobapplication389@gmail.com', "Candidate Selected for ".$post->title." Successful", $caption, $contents);
        if($post->positions == count($post->candidates))
        {
            $post->status = 'closed';
            $post->save();
        }
        return redirect()->back();
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $username)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('v2.employers.selection.show')
                ->with('post',$post);
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
