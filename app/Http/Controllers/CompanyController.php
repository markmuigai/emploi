<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Storage;
use Image;

use App\Company;
use App\CompanySize;
use App\Industry;
use App\Location;

use App\Jobs\EmailJob;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index','show','companiesFeatured'
        ]]);
    }

    public function companiesFeatured($counter = 24){
        $counter = $counter < 1 ? 10 : $counter;
        $companies = Company::getHiringCompanies2($counter);
        $ret = [];
        for($i =0; $i<count($companies); $i++)
        {
            $company = $companies[$i];
            $ret[] = [$company->name, count($company->activePosts),$company->logoUrl];
        }
        return $ret;
    }

    public function index(Request $request)
    {
        if(isset($request->hiring))
        {
            return view('companies.index')
                ->with('hiring',true)
                ->with('companies',Company::getHiringCompanies2(81));
        }
        return view('companies.index')
                ->with('companies',Company::where('status','active')->where('name','not like','%sex%')->where('name','not like','%fuck%')->where('name','not like','%http%')->where('name','not like','%adult%')->where('name','not like','%crypto%')->where('name','not like','%free%')->where('name','not like','%$%')->where('name','not like','%dating%')->orderBy('featured','DESC')->orderBy('id','DESC')->paginate(9));
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

        $request->validate([
            'name'          =>  ['required','max:50', 'unique:companies','string'],
            'logo'          => ['required','mimes:png,jpg,jpeg','max:51200'],
            'cover'         => ['mimes:png,jpg,jpeg','max:51200'],
        ]);

        $user = Auth::user();
        $c = Company::where('name',$request->name)->first();

        $co_name = $request->name;

        if(isset($c->id))
        {
            $co_name = $request->name.'-'.rand(1,900);
        }

        $avatar = $request->file('logo');
        $logo = time() . '.' . $avatar->getClientOriginalExtension();
        $storage_path = storage_path().'/app/public/companies/'.$logo;

        Image::make($avatar)->resize(300, 300)->save($storage_path);

        // $storage_path = '/public/companies';
        // $logo = basename(Storage::put($storage_path, $request->logo));
        //$logo = null;
        $cover = null;
        if(isset($request->cover))
        {
            $avatar = $request->file('cover');
            $cover = time() . '.' . $avatar->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/companies/'.$cover;

            Image::make($avatar)->resize(1280, 720)->save($storage_path);

            //$cover = basename(Storage::put($storage_path, $request->cover));
        }

        $c = Company::create([
            'name' => $co_name, 
            'user_id' => $user->id,
            'about' => $request->about,
            'website' => $request->website ? $request->website : null, 
            'industry_id' => $request->industry,
            'location_id' => $request->location,
            'company_size_id' => $request->company_size,
            'cover' => $cover,
            'logo' => $logo,
            'phone_number' => isset($request->phone_number) ? $request->phone_number : null,
            'email' => isset($request->email) ? $request->email : null,
        ]);

        if(isset($c->id))
        {
            $message = $c->name." has been created successfully. <br> You can now post vacancies <a href='/vacancies/create'>here</a>";

            $caption = "A new company has been created on Emploi";
            $contents = $c->user->name." has created a company on Emploi using the name <b>".$c->name."<b>.<br>
            Log in to <a href='/admin/panel'>Admin panel</a> to manage companies.";
            EmailJob::dispatch('Emploi Team', 'jobapplication389@gmail.com', 'Company '.$c->name.' Created', $caption, $contents);
        }
        else
        {
            $message = "Failed to create your company profile. <br> Click here <a href='/companies/create'>here</a> to retry.";
        }
        

        
        

        return view('companies.message')
                ->with('message',$message);
        

    }

    public function show($slug)
    {
        $co = Company::where('name',$slug)->firstOrFail();
        return view('companies.view')
                ->with('company',$co);
        
    }

    public function edit($id)
    {
        $user = Auth::user();
        $c = Company::where('name',$id)->firstOrFail();
        if($c->user_id != $user->id)
            abort(403);
        return view('companies.edit')
                ->with('industries',Industry::where('status','active')->get())
                ->with('locations',Location::where('status','active')->orderBy('country_id')->orderBy('name')->get())
                ->with('sizes',CompanySize::all())
                ->with('company',$c);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          =>  ['required','max:50','string'],
            'about'         =>  ['string'],
            'website'       =>  ['max:255' ,'string'],
            'phone_number'  =>  ['max:20' ,'string'],
            'tagline'       =>  ['max:2000' ,'string'],
            'email'         =>  ['required', 'max:20' ,'email'],
            'logo'          => ['mimes:png,jpg,jpeg','max:51200'],
            'cover'         => ['mimes:png,jpg,jpeg','max:51200'],
        ]);

        $user = Auth::user();
        $c = Company::findOrFail($id);
        if($c->user_id != $user->id)
            abort(403);
        $logo = $c->logo;
        if(isset($request->logo))
        {
            // $storage_path = '/public/companies';
            // $logo = basename(Storage::put($storage_path, $request->logo));

            $avatar = $request->file('logo');
            $logo = time() . '.' . $avatar->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/companies/'.$logo;

            Image::make($avatar)->resize(300, 300)->save($storage_path);
        }
        $cover = $c->cover;
        if(isset($request->cover))
        {
            $avatar = $request->file('cover');
            $cover = time() . '.' . $avatar->getClientOriginalExtension();
            $storage_path = storage_path().'/app/public/companies/'.$cover;

            Image::make($avatar)->resize(1280, 720)->save($storage_path);

            // $storage_path = '/public/companies';
            // $cover = basename(Storage::put($storage_path, $request->cover));
        }

        $c->name = $request->name;
        $c->logo = $logo;
        $c->cover = $cover;
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

    public function makeFeatured($name)
    {
        $user = Auth::user();
        $company = Company::where('name',$name)->firstOrFail();
        if($company->user->id != $user->id)
            return abort(403);
        $boosts = $user->employer->remainingCompanyBoosts();

        if(count($boosts)>0)
        {
            if($company->makeFeatured($boosts[0]))
            {
                return view('companies.featured.featured-success')
                        ->with('company',$company);
            }
        }
        return view('companies.featured.featured-failed')
                ->with('company',$company);
    }
}
