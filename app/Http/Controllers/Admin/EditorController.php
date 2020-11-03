<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\CvEditor;
use App\Industry;
use App\User;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admins.cveditors.index')
                ->with('editors',CvEditor::orderBy('created_at','DESC')->paginate(10));
    }

    public function create()
    {
        return view('admins.cveditors.create')
                ->with('industries',Industry::orderBy('name')->get());
    }

    public function store(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!isset($user->id))
        {
            return view('admins.cveditors.message')
                        ->with('title','Failed')
                    ->with('message','Failed to create a cv-editor as email '.$request->email.' is not registered');
        }
        $editor = CvEditor::where('user_id',$user->id)->first();
        if(isset($editor->id))
        {
            return view('admins.cveditors.message')
                        ->with('title','Failed')
                    ->with('message','The email '.$request->email.' is already a Cv Editor');
        }

        CvEditor::create([
            'user_id' => $user->id,
            'industry_id' => isset($request->industry) ? $request->industry : null
        ]);

        return view('admins.cveditors.message')
                    ->with('title','Success')
                    ->with('message',$user->name.' with email '.$request->email.' is now a Cv Editor');
    }

    public function show($id)
    {
        $editor = CvEditor::findOrFail($id);

        return view('admins.cveditors.show')
                    ->with('editor',$editor);
    }

    public function edit($id)
    {
        return view('admins.cveditors.edit')
                ->with('editor',CvEditor::findOrFail($id))
                ->with('industries',Industry::orderBy('name')->get());
    }

    public function update(Request $request, $id)
    {
        $editor = CvEditor::findOrFail($id);
        //if(isset($request->industry))
        $editor->industry_id = isset($request->industry) ? $request->industry : null;
        $editor->status = $request->status;
        $editor->save();
        return redirect('/admin/cveditors/'.$editor->id);
    }

    public function destroy($id)
    {
        //
    }
}
