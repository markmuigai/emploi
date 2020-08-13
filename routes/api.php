<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/total-jobs', 'ApiController@getTotalJobs');
Route::get('/total-seeker-paas', 'ApiController@totalJpaasSub');
Route::get('/total-employer-paas', 'ApiController@totalEpaasSub');
Route::get('/total-paas-tasks', 'ApiController@totalTasks');


Route::get('/total-candidates', 'ApiController@getTotalCandidates');
Route::get('/total-companies', 'ApiController@getTotalCompanies');
Route::get('/total-hiring-companies', 'ApiController@getTotalHiringCompanies');
Route::get('/job-seekers-who-found-their-way', 'ApiController@getSeekersWhoFoundTheirWay');
Route::get('/latest-blogs', 'ApiController@getLatestBlogs');


