<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documentation;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $doc=Documentation::where('parent_id',null)->orderBy('id','DESC')->paginate(10);
            return view('super.documentation.index')
                ->with('documentations',$doc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('super.documentation.create')
                ->with('documents',Documentation::orderBy('title')->get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $doc = Documentation::create([
            'parent_id'=>$request->parent_id,
            'title' => $request->title, 
            'content' => $request->content
        ]);
        return redirect('/desk/documentation/'.$doc->id);
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
          $doc = Documentation::findOrFail($id);
        return view('super.documentation.show')
                ->with('doc',$doc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $document=Documentation::findOrFail($id);
        return view('super.documentation.edit')
                ->with('document',$document);
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
        
        $doc = Documentation::findOrFail($id);
        $doc->parent_id = $request->parent_id;
        $doc->title = $request->title;
        $doc->content = $request->content;
        $doc->save();
        return redirect('/desk/documentation/'.$doc->id);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
      $keyword=$request->input('search');
      $documentations=Documentation::where('title','LIKE','%'.$keyword.'%')->get();
      return view('super.documentation.search',['documentations'=>$documentations]);
    }
}
