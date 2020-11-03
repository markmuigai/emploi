<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Industry;
use App\IndustrySkill;

class IndustrySkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return redirect('/admin/industries');
    }

    public function create(Request $request)
    {
        return view('admins.industrySkills.create')
                ->with('request',$request);
    }

    public function store(Request $request)
    {
        $sk = IndustrySkill::create([
            'name' => $request->name,
            'industry_id' => $request->industry_id
        ]);
        if(!isset($sk->id))
            die("An Error occurred creating skill");
        $ind = $sk->industry;
        return redirect('/admin/industries/'.$ind->slug);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admins.industrySkills.edit')
                ->with('skill',IndustrySkill::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $skill = IndustrySkill::findOrFail($id);
        $skill->name = $request->name;
        $skill->save();
        return redirect('/admin/industries/'.$skill->industry->slug);
    }

    public function destroy($id)
    {
        //
    }
}
