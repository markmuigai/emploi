<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\PostGroup;
use App\PostGroupJob;

class PostGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admins.postGroup.index')
                ->with('postGroups',PostGroup::Where('status','active')->orderBy('id','DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.postGroup.create')
                ->with('posts',Post::orderBy('id','DESC')->limit(200)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $slug = explode(" ", strtolower($request->title));
        $slug = implode("-", $slug).PostGroup::generateRandomString(10);
        $pg = PostGroup::create([
            'slug' => $slug, 
            'title' => $request->title, 
            'description' => $request->description,
            'how_to_apply' => $request->how_to_apply
        ]);
        if(isset($request->post_ids))
        {
            for($i=0; $i<count($request->post_ids);$i++)
            {
                PostGroupJob::create([
                    'post_id' => $request->post_ids[$i],
                    'post_group_id' => $pg->id
                ]);
            }
        }
        return redirect('/admin/job-post-groups/'.$pg->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pg = PostGroup::findOrFail($id);
        return view('admins.postGroup.show')
                ->with('postGroup',$pg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pg = PostGroup::findOrFail($id);
        return view('admins.postGroup.edit')
                ->with('posts',Post::orderBy('id','DESC')->limit(200)->get())
                ->with('postGroup',$pg);
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
        $pg = PostGroup::findOrFail($id);
        $pg->title = $request->title;
        $pg->description = $request->description;
        $pg->how_to_apply = $request->how_to_apply;
        $pg->save();

        $pgs = $pg->postGroupJobs;

        for($i=0; $i<count($pgs); $i++)
        {
            $pgs[$i]->delete();
        }

        if(isset($request->post_ids))
        {
            for($i=0; $i<count($request->post_ids);$i++)
            {
                PostGroupJob::create([
                    'post_id' => $request->post_ids[$i],
                    'post_group_id' => $pg->id
                ]);
            }
        }

        return redirect('/admin/job-post-groups/'.$pg->id);
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
