<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\PartTimer;
use App\OffboardingTask;

use Auth;

class OffboardingTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function tasks(Request $request)
    {
        $tasks = Task::where('employer_id', Auth::user()->employer->id)->where('status','!=', 'pending')->paginate(5);

        // return $task;
        return view('employers.dashpaas.offboarding.tasks')
            ->with('tasks', $tasks);
    }

     public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {   
        $user = Auth()->user();
        return view('employers.dashpaas.offboarding.create')
                    ->with('prof',PartTimer::where('status','selected')->where('task_slug',$slug)->orderBy('created_at', 'desc')->get());;
    }

    public function complete($id)
    {    
   
        $t = Task::Where('id',$id)->firstOrFail();
        $t->update(['status' =>'completed','ended_at' =>now()]);
        $saved = $t->save();
        return redirect()->back();       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $t = OffboardingTask::create([          
            'user_id' => $user->id, //the logged in user id 
            'title' => $request->title,
            'status' => $request->status,
            'part_timer' => $request->part_timer,
            'assigned_to' => $request->assigned_to,
            'date' => $request->date,
            'category' =>$request->category, 
            'description' => $request->description
        ]);
        
        return redirect('/employers/admin-paas');

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
        $t = OffboardingTask::where('id', $id)->first();

        return view('employers.dashpaas.offboarding.show')
                ->with('t', $t);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $t = OffboardingTask::findOrFail($id);
        return view('employers.dashpaas.offboarding.edit')
                ->with('t',$t);
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
        $t = OffboardingTask::findOrFail($id);
        $t->title = $request->title;
        $t->status = $request->status;
        $t->part_timer = $request->part_timer;
        $t->assigned_to = $request->assigned_to;
        $t->date = $request->date;
        $t->category = $request->category;
        $t->description = $request->description;
        $t->save();

        return redirect('/employers/admin-paas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t =OffboardingTask::findOrFail($id);
        $t->delete();
        return redirect('/employers/admin-paas');
    }
}
