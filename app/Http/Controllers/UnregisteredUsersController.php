<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UnregisteredUser;
use App\User;

class UnregisteredUsersController extends Controller
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
        $users = UnregisteredUser::orderBy('email','ASC')->paginate(10);
        return view('admins.unregistered_users.index')
                ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.unregistered_users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user = User::where('email',$request->email)->first();

        $u = UnregisteredUser::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        if(isset($u->id))
        {
            return redirect('/admins/unregistered-users/'.$u->id);
        }
        return redirect('/admins/unregistered-users/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UnregisteredUser::findOrFail($id);
        return view('admins.unregistered_users.show')
                ->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UnregisteredUser::findOrFail($id);
        return view('admins.unregistered_users.edit')
                ->with('user',$user);
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
        $user = UnregisteredUser::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/admin/unregistered-users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $u = UnregisteredUser::findOrFail($id);
        $u->delete();
        return redirect('/admin/unregistered-users');
    }
}
