<?php

namespace App\Http\Controllers\JobSeeker;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    /**
     * Display a listing of the faq.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('v2.seekers.faqs')
                ->with('faqs',Faq::where('permission_id',4)->orderBy('created_at', 'desc')->paginate(10));
    }

    /**
     * Show the form for creating a new faq.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created faq in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified faq.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified faq.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified faq in storage.
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
     * Remove the specified faq from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
