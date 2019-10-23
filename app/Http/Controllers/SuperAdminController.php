<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Country;
use App\Jurisdiction;
use App\User;
use App\UserPermission;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('super');
    }

    public function admins(Request $request){
    	return view('super.admins')
    		->with('admins',User::admins())
    		->with('oadmins',User::inactiveAdmins());
    }

    public function create(Request $request){
    	return view('super.create')
    		->with('countries',Country::all());
    }

    public function saveAdmin(Request $request){
    	//return $request->all();
    	$admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => User::generateRandomString(10),
        ]);
        if(!isset($admin->id))
        {
        	die("Failed to create admin<br><a href='/home'>Home</a>");
        }
        $adminPerm = UserPermission::create([ 'user_id' => $admin->id, 'permission_id' => 2 ]);
        Jurisdiction::create([ 'user_permission_id' => $adminPerm->id, 'country_id' => 1 ]);

        $c = Country::findOrFail($request->country);

        die("Admin created succesfully. <br>
        	Name: ".$request->name." <br>
        	username: ".$request->username." <br>
        	E-mail: ".$request->email." <br>
        	Password: ".$request->password." <br>
        	Country: ".$c->name."<br><br><a href='/home'>Home</a>");

    }

    public function enable(Request $request){
    	$admin = User::findOrFail($request->id);
    	$perm = UserPermission::where('user_id',$admin->id)->first();
    	
    	$perm->status = 'active';
    	$perm->save();
    	return redirect('/home');
    	dd($admin);
    }

    public function disable(Request $request){
    	$admin = User::findOrFail($request->id);
    	$perm = UserPermission::where('user_id',$admin->id)->first();
    	
    	$perm->status = 'inactive';
    	$perm->save();
    	return redirect('/home');
    	dd($admin);
    }
}
