<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;
use App\Blogger;
use App\User;

class BloggersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admins.bloggers.index')
                ->with('bloggers',Blogger::orderBy('status')->paginate(10));
    }

    public function create()
    {
        return view('admins.bloggers.create');
    }

    public function store(Request $request)
    {
        $user = User::where('email',$request->email)->firstOrFail();
        $blogger = Blogger::where('user_id',$user->id)->first();

        if(isset($blogger->id))
        {
            return redirect('/admin/bloggers/'.$blogger->id);
        }

        $blogger = Blogger::create([
            'user_id' => $user->id,
            'status' => $request->status
        ]);

        return redirect('/admin/bloggers/'.$blogger->id);

    }

    public function show($id)
    {
        $blogger = Blogger::findOrFail($id);
        $blogs = Blog::where('user_id',$blogger->user_id)->paginate(20);
        return view('admins.bloggers.show')
                ->with('blogger',$blogger)
                ->with('blogs',$blogs);
    }

    public function edit($id)
    {
        return view('admins.bloggers.edit')
                ->with('blogger',Blogger::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $b = Blogger::findOrFail($id);
        $b->status = $request->status;
        $b->save();
        return redirect('/admin/bloggers/'.$b->id);

    }

    public function destroy($id)
    {
        //
    }
}
