<?php

namespace App\Http\Controllers\Employer;

use DB;
use App\Post;
use App\Seeker;
use App\Industry;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrowseCandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //errors exist
        $seekers = Seeker::orderBy('featured')->paginate(12);
        $title = "Browse Job Seekers";
        //$location = isset($request->location_id) ? " OR location_id = ".$request->location_id : '';
        $industry = isset($request->industry) ? Industry::where('slug',$request->industry)->firstOrFail() : '';
        $q = $request->q ? '"%'.$request->q.'%"' : '';
        $query = $q == '' ? '' : "WHERE experience like $q OR (education LIKE $q OR resume_contents LIKE $q)";
        //dd($query);
        if($query == '')
        {
            if(isset($request->location))
            {
                $query .= " WHERE location_id = ".$request->location;
            }
        }
        else
        {
            if(isset($request->location))
            {
                $query .= " AND location_id = ".$request->location;
            }
        }

        //dd($query);

        if($query == '')
        {
            if(isset($request->industry))
            {
                $query .= " WHERE industry_id = ".$industry->id;
            }
        }
        else
        {
            if(isset($request->industry))
            {
                $query .= " AND industry_id = ".$industry->id;
            }
        }

        //$query = $query == '' ? '' : "$query";
        $sql = "SELECT id FROM seekers $query ORDER BY featured DESC";
        //dd($sql);
        $results = DB::select($sql);

        //dd($sql);
        $arr = [];
        for($i=0;$i<count($results); $i++)
        {
            $arr[] = $results[$i]->id;
        }
        //$results = DB::select($arr);

        $seekers = Seeker::whereIn('id',$arr)->orderBy('featured','DESC')->paginate(12)->appends(request()->query());
        //dd($seekers);

        return view('v2.employers.browse-candidates.index',[
            'seekers' => $seekers,
            'industries' => Industry::active(),
            'locations' => Location::active(),
            'location' => $request->location ,
            'industry' => $industry ? $industry : '',
            'query' => $request->q,
            'title' => $title,
            'post' => Post::findOrFail(request()->post)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
