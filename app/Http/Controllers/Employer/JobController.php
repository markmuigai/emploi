<?php

namespace App\Http\Controllers\Employer;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = isset($request->q) ? $request->q : '';
        $employer = auth()->user()->employer;

        $companies = $employer->user->companies;
        $company_ids = array();

        for($i=0; $i<count($companies); $i++)
        {
            array_push($company_ids, $companies[$i]->id);
        }

        if(isset($request->q)){
            $posts = Post::whereIn('company_id',$company_ids)->where('title','like','%'.$request->q.'%')->orderBy('id','DESC')->paginate(20);
        }else{
            $posts = Post::whereIn('company_id',$company_ids)->orderBy('id','DESC')->paginate(20);
        }


        return view('v2.employers.jobs.index',[
            'q' => $q,
            'posts' => $posts,
            'recentApplications' => auth()->user()->employer->recentApplications()
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
