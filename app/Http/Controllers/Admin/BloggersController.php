<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Blog;
use App\Blogger;
use App\Referral;
use App\User;

use App\Jobs\EmailJob;

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
        $user = User::where('email',$request->email)->first();
        if(!isset($user->id))
        {
            //$full_name = $request->first_name.' '.$request->last_name;
            $name = $request->name;
            $username = explode(" ", $name);
            $username = strtolower(implode("", $username).rand(1000,30000));
            $username = explode(".", $username);
            $username = implode('',$username);

            $password = User::generateRandomString(10);

            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'username' => $username,
                'email_verification' => User::generateRandomString(10),
                'password' => Hash::make($password),
            ]);



            $credited = Referral::creditFor($request->email,20);

            $caption = "Blogging account created on Emploi";
            $contents = "Here are your login credentials for Emploi: <br>
            username: $username <br>
            password: $password

            <br><br>
            <a href='".url('/veify-account/'.$user->email_verification)."'>Verify Account</a> and Log in to finish setting up your account and start writing blogs.
            ";
            EmailJob::dispatch($user->name, $user->email, 'Emploi Login Credentials', $caption, $contents);

        }
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
