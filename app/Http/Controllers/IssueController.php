<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Issue;
use App\PartTimer;
use App\Task;

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
                ->with('issues',Issue::orderBy('id','DESC')->paginate(5));
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
            'task_slug' =>$request->slug,
            'assignee' => $request->assignee,
            'start_on'=>$request->start_date,
            'due_date'=>$request->due_date
        ]);
        return redirect('/issues');
        // return redirect('/issues/edit/'.$i->id);
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $issue = Issue::where('task_slug', $slug)->get();
        $task = Task::where('slug', $slug)->get();

        return view('issues.show')
                ->with('task', $task)
                ->with('issue',$issue);
    }

    public function view($id)
    {
        $issue = Issue::where('id', $id)->get();

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
        // return redirect('/issues/'.$issue->id);
        return redirect('/issues');

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

    public function issueView()
    {
        $user = Auth::user();
        $i = Issue::where('assignee', $user->name)->paginate(10);

        return view('seekers.issues')
                ->with('i',$i);
    }

    public function issueShow($id)
    {
        $issue = Issue::where('id', $id)->get();

        return view('seekers.issue')
                ->with('issue',$issue);
    }

}