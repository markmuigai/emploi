<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Industry;
use App\Task;
use App\PartTimer;
use App\Issue;



class TaskController extends Controller
{
    //
    public function editTask($slug)
    {
        $task = Task::where('slug', $slug)->firstOrFail();
        $industries = Industry::where('status','active')->get();

        return view('employers.dashpaas.edit-task')
            ->with('task', $task)
            ->with('industries',$industries);
                    
    }

    public function update(Request $request, $slug)
    {
        $task = Task::where('slug',$slug)->firstOrFail();

        $request->validate([
            'firstname'   =>  ['required','max:50','string'],
            'lastname'    =>  ['required','max:50','string'],
            'email'       =>  ['required','string', 'email', 'max:50'],
            'phone_number'=>  ['required', 'string', 'max:15'],
            'company'     =>  ['max:100','string'],
            'task_title'  =>  ['max:100','string'],
        ]);

        $task->name = $request->firstname. ' ' .$request->lastname;               

        $task->email = $request->email;
        $task->phone_number = $request->phone_number;
        $task->company = $request->company;
        $task->title = $request->task_title;
        $task->positions = $request->positions;
        $task->description = $request->task_description;
        $task->industry = $request->industry;
        $task->salary = $request->salary;

        $task->save();
        return redirect('/employers/task/'.$task->slug);
    }

    public function delete($slug)
    {
        $task = Task::where('slug',$slug);
        $task->delete($slug);
        return redirect('/employers/requests');
    }

    public function shortlist($slug)
    {
        $pros = PartTimer::where('task_slug',$slug)->get();
        $tasks = Task::where('slug', $slug)->get();
        $industries = Industry::where('name', $slug)->get();
        
        
        return view('employers.dashpaas.shortlist')
            ->with('pros',$pros)
            ->with('tasks', $tasks)
            ->with('industries', $industries);
    }

}
