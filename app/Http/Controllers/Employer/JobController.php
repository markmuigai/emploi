<?php

namespace App\Http\Controllers\Employer;

use App\Utils\CollectionHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $employer = auth()->user()->employer;

        $companies = $employer->user->companies;

        // Get posts associated with the companies of the employer
        $posts = $companies->map(function($company){
            return $company->posts;
        })->flatten()->sortByDesc('id');

        if(request()->job_category == 'shortlisting'){
            $posts = $posts->filter(function($post){
                return $post->how_to_apply == null;
            });
        }

        if(request()->job_category == 'active'){
            $posts = $posts->filter(function($post){
                return $post->status == 'active';
            });
        }

        if(request()->job_category == 'other'){
            $posts = $posts->filter(function($post){
                return $post->status != 'active';
            });
        }

        return view('v2.employers.jobs.index',[
            'posts' => CollectionHelper::paginate($posts, 10),
            'recentApplications' => $employer->recentApplications()
        ]);
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
    public function store(Request $request)
    {
        //
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
