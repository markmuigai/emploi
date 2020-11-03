<?php

namespace App\Http\Controllers\JobSeeker;

use App\UserSavedPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dd($request->postId); 

        // Check if the user_post record exists i.e has liked/unliked beifre
        $previous = UserSavedPost::where('user_id', auth()->user()->id)
                        ->where('post_id', $request->postId)->first();


        // dd($previous->toArray());  

        if($previous == null){
            UserSavedPost::create([
                'user_id' => auth()->user()->id,
                'post_id' => $request->postId,
                'status' => true
            ]);
        }else{
            // Update exisiting record
            $previous->update([
                'status' => $previous->status ? false : true
            ]);
        }

        return redirect()->route('v2.vacancies.index');
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
