<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\CvEditor;
use App\CvEditRequest;

class CvEditController extends Controller
{
    public function __construct() {
        $this->middleware('editor', ['except' => [
            'show','store'
        ]]);
    }

    public function index()
    {
        return view('cvediting.index');
                //->with('editRequests',Auth::user()->cvEditor->cvEditRequests->paginate(10));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
