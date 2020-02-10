<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Industry;

class IndustryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        return view('admins.industries.index')
                ->with('industries',Industry::orderBy('name')->paginate(10));
    }

    public function create()
    {
        return view('admins.industries.create');
    }

    public function store(Request $request)
    {
        $ind = Industry::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status
        ]);
        return redirect('/admin/industries/'.$ind->slug);
    }

    public function show($slug)
    {
        $ind = Industry::where('slug',$slug)->firstOrFail();
        return view('admins.industries.show')
                ->with('industry',$ind);
    }

    public function edit($slug)
    {
        $ind = Industry::where('slug',$slug)->firstOrFail();
        return view('admins.industries.edit')
                ->with('industry',$ind);
    }

    public function update(Request $request, $slug)
    {
        $ind = Industry::where('slug',$slug)->firstOrFail();
        $ind->status = $request->status;
        $ind->slug = $request->slug;
        $ind->name = $request->name;
        $ind->save();

        return redirect('/admin/industries/'.$ind->slug);
    }

    public function destroy($id)
    {
        //
    }
}
