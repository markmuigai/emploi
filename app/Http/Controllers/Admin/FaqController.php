<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

use App\Faq;
use App\Permission;

class FaqController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admins.faqs.index')
                ->with('faqs',Faq::orderBy('id','DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.faqs.create')
                ->with('permissions',Permission::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $f = Faq::create([
            'title' => $request->title, 
            'description' => $request->description, 
            'permission_id' => $request->permission
        ]);
        return redirect('/admin/faqs/'.$f->id);
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admins.faqs.show')
                ->with('faq',$faq);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admins.faqs.edit')
                ->with('permissions',Permission::all())
                ->with('faq',$faq);

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
        $faq = Faq::findOrFail($id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->permission_id = $request->permission;
        $faq->save();
        return redirect('/admin/faqs/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect('/admin/faqs');
    }
}
