<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;

use App\Company;
use App\CompanySize;
use App\Industry;
use App\Location;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index','show'
        ]]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        return view('companies.create')
                ->with('industries',Industry::where('status','active')->get())
                ->with('locations',Location::where('status','active')->orderBy('country_id')->orderBy('name')->get())
                ->with('sizes',CompanySize::all());
    }

    public function store(Request $request)
    {
        //return $request->all();
        $user = Auth::user();
        $c = Company::where('name',$request->name)->first();
        if(!isset($c->id))
        {
            $c = Company::create([
                'name' => $request->name, 
                'user_id' => $user->id,
                'about' => $request->about,
                'website' => $request->website, 
                'industry_id' => $request->industry,
                'location_id' => $request->location,
                'company_size_id' => $request->company_size
            ]);

            if(isset($c->id))
            {
                $message = $c->name." has been created succesfully. <br> You can now post vacancies <a href='/vacancies/create'>here</a>";
            }
            else
            {
                $message = "Failed to create your company profile. <br> Click here <a href='/companies/create'>here</a> to retry.";
            }
        }
        else
        {
            $message = "Failed to create your company profile, another company exists with the same name. <br> Click here <a href='/companies/create'>here</a> to retry.";
        }

        
        

        return view('companies.message')
                ->with('message',$message);
        

    }

    public function show($id)
    {
        return Company::findOrFail($id);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $c = Company::findOrFail($id);
        if($c->user_id != $user->id)
            abort(404);
        return view('companies.edit')
                ->with('industries',Industry::where('status','active')->get())
                ->with('locations',Location::where('status','active')->orderBy('country_id')->orderBy('name')->get())
                ->with('sizes',CompanySize::all())
                ->with('company',$c);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $c = Company::findOrFail($id);
        if($c->user_id != $user->id)
            abort(404);
        $logo = null;
        if(isset($request->logo))
        {
            $storage_path = '/public/companies';
            $logo = basename(Storage::put($storage_path, $request->logo));
        }
        $c->name = $request->name;
        $c->logo = $logo;
        $c->tagline = $request->tagline;
        $c->about = $request->about;
        $c->website = $request->website;
        $c->industry_id = $request->industry_id;
        $c->company_size_id = $request->company_size_id;
        $c->location_id = $request->location_id;
        $c->save();
        return redirect('/profile');

        return $request->all();
    }

    public function destroy($id)
    {
        //
    }
}
