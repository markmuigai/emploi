<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Storage;

use App\UnregisteredUser;
use App\User;

class UnregisteredUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function import(Request $request)
    {
        $storage_path = storage_path();
        $file = $storage_path.'/app/unique-emails.csv';
        if(file_exists($file)){
                    
            $handle = fopen($file, "r");
            for ($i = 0; $row = fgetcsv($handle ); ++$i) {

                $email = User::cleanEmail($row[0]);
                $match = UnregisteredUser::where('email',$email)->first();


                if(filter_var($email, FILTER_VALIDATE_EMAIL) && !isset($match->id)){
                    UnregisteredUser::create([
                        'email' => $email,
                        'name' => 'Job Seeker'
                    ]);
                }


                //UnregisteredUser::create(['email',$email]);
                
                // if(User::subscriptionStatus($email))
                // {
                //     VacancyEmail::dispatch($email,'there', $subject, $caption, $contents,$banner,$template,$attachment1, $attachment2, $attachment3);
                //     //print "<br> ".$row[0];
                // }
                
            }
            fclose($handle);
            
        }
        $storage_path = storage_path();
        $file = $storage_path.'/app/unique-emails2.csv';
        if(file_exists($file)){
                    
            $handle = fopen($file, "r");
            for ($i = 0; $row = fgetcsv($handle ); ++$i) {

                $email = User::cleanEmail($row[0]);
                $name = $row[1];
                $match = UnregisteredUser::where('email',$email)->first();

                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(!isset($match->id))
                    {
                        UnregisteredUser::create([
                            'email' => $email,
                            'name' => $name
                        ]);
                    }
                    else
                    {
                        $match->name = $name;
                        $match->save();
                    }
                    
                }
            }
            fclose($handle);
            
        }
        return redirect('/admin/unregistered-users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = UnregisteredUser::orderBy('created_at','DESC')->paginate(10);
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
            return redirect('/admin/unregistered-users/'.$u->id);
        }
        return redirect('/admin/unregistered-users/create');
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
