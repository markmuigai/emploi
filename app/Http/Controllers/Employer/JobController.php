<?php

namespace App\Http\Controllers\Employer;

use App\Utils\CollectionHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function index()
	{
		$employer = auth()->user()->employer;
		$posts = $employer->posts;

		if (request()->job_category == 'shortlisting') {
			$posts = $employer->shortlistingPosts;
		}

		if (request()->job_category == 'active') {
			$posts = $employer->activePosts;
		}

		if (request()->job_category == 'other') {
			$posts = $employer->closedPosts;
		}

		return view('v2.employers.jobs.index', [
			'posts' => CollectionHelper::paginate($posts, 10),
			'recentApplications' => $employer->recentApplications()
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
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
