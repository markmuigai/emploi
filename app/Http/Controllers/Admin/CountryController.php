<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index()
    {
        return view('admins.countries.index')
                ->with('countries',Country::orderBy('name')->paginate(10));
    }

    public function create()
    {
        return view('admins.countries.create');
    }

    public function store(Request $request)
    {
        $c = Country::create([
            'name' => $request->name, 
            'code' => $request->code, 
            'prefix' => $request->prefix,
            'status' => $request->status,
            'currency' => $request->currency,
            'status' => 'active'
        ]);

        return redirect('/admin/countries/'.$c->id);
    }

    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('admins.countries.show')
                ->with('country',$country);
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admins.countries.edit')
                ->with('country',$country);
    }

    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->prefix = $request->prefix;
        $country->code = $request->code;
        $country->currency = $request->currency;
        $country->save();
        return redirect('/admin/countries/'.$country->id);
    }
    
    public function destroy($id)
    {
        //
    }
}
