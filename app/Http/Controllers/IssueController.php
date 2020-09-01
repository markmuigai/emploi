<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\PartTimer;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issues.index')
                ->with('issues',Issue::orderBy('id','DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issues.create')
                    ->with('prof',PartTimer::where('status','selected')->orderBy('created_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $i = Issue::create([
            'title' => $request->title, 
            'description' => $request->description, 
            'task_slug' =>0,
            'assignee' => $request->assignee,
            'start_on'=>$request->start_date,
            'due_date'=>$request->due_date
        ]);
        return redirect('/issues/'.$i->id);
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issue = Issue::findOrFail($id);
        return view('issues.show')
                ->with('issue',$issue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        return view('issues.edit')
                ->with('issue',$issue)
                ->with('prof',PartTimer::where('status','selected')->get());
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
        $issue = Issue::findOrFail($id);
        $issue->title = $request->title;
        $issue->description = $request->description;
        $issue->assignee = $request->assignee;
        $issue->save();
        return redirect('/issues/'.$issue->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issue =Issue::findOrFail($id);
        $issue->delete();
        return redirect('/issues');
    }
}
