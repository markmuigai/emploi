<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;
use App\Issue;
use App\PartTimer;
use App\Task;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user = Auth::user();
        return view('messages.index')
                ->with('messages',Message::Where('from_id', $user->id)->orderBy('id','DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create')
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
        $t = Task::where('slug', $request->slug)->first();
        $user = Auth::user();
        $m = Message::create([
            'title'=>$t->title,
            'task_slug' =>$request->slug,
            'body' => $request->body,           
            'to_id' => $request->to_id,
            'from_id'=>$user->id
        ]);
        return redirect('/messages');
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($to_id)
    {
        $user = Auth::user();
        $seeker = Message::where('to_id', $to_id)->orderBy('id','DESC')->paginate(4);
        $employer = Message::where('to_id', $user->id)->Where('from_id',$to_id)->orderBy('id','DESC')->paginate(4);
        // $task = Task::where('slug', $slug)->get();

        return view('messages.show')
                // ->with('task', $task)
                ->with('seeker',$seeker)
                ->with('employer',$employer);
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
