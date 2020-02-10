@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Documentation')
<div class="card">
    <div class="card-body">
        <div class="text-right">
            <h2>EMPLOI DOCUMENTATION</h2>
            <p>By Obare C. Brian and David Kirarit</p>

        </div>



<p>

<h3>Routes</h3>
<p>The routes directory contains all of the route definitions for  application. By default, several route files are included with Laravel: web.php, api.php, console.php and channels.php.</p>
<p>The <b>web.php</b> file contains routes that the RouteServiceProvider places in the web middleware group, which provides session state,
CSRF protection, and cookie encryption.</p> 
<p>The <b>api.php</b> file contains routes that the RouteServiceProvider places in the api middleware group, which provides rate limiting.
These routes are intended to be stateless, so requests entering the application through these routes are intended to be authenticated via tokens and will not have access to session state.</p>
<p>The <b>console.php</b> file is where you may define all of your Closure based console commands. Each Closure is bound to a command instance allowing a simple approach to interacting with each command's IO methods. Even though this file does not define HTTP
routes, it defines console based entry points (routes) into the application.</p>
<p>The <b>channels.php</b> file is where you may register all of the event broadcasting channels that your application supports.</p>
<ul>
	<li>Route::get('/robots.txt', 'ContactController@robotsFile'); -> dispays confirmation page for real humans</li>

    <li>Route::get('/ads.txt', 'ContactController@googleAdsFile'); -> displays google ads
 </li>

 <li>Route::get('/join', 'ContactController@join');  ->dipslays the registration page for both company and job seeker</li>
<li>Route::get('/invites/{slug}', 'ContactController@invited');  ->invite friend with a particular ID to register</li>
<li>Route::get('/careers', 'ContactController@careers'); ->displays career page</li>

<li>Route::get('/contact', 'ContactController@contact'); ->displays contact page</li>

<li>Route::get('/about', 'ContactController@about'); ->displays about page</li>
<li>Route::get('/our-team', 'ContactController@team'); -> dipslays team members </li>
<li>Route::get('/our-clients', 'ContactController@clients'); ->shows our clients</li>
<li>Route::get('/terms-and-conditions', 'ContactController@terms'); ->shows our terms and conditions</li>
<li>Route::get('/privacy-policy', 'ContactController@policy'); ->displays our privacy policy</li>
<li>Route::get('/mass-recruitment', 'ContactController@mass_recruitment'); ->displays what we offer on mass recruitment</li>
<li>Route::get('/employers/role-suitability-index', 'ContactController@rsi'); ->displays an important tool for employers to evaluate a candidate's abilities by measuring the candidates strengths and weaknesses. </li>
</ul>

</p>


    </div>
</div>

@endsection