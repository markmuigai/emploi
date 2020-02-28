@extends('layouts.dashboard-layout')

@section('title','Emploi :: Super Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Routes Documentation')
<div class="card">
    <div class="card-body">
        <div class="dropdown">
            <a href="#" class="btn btn-green px-3" data-toggle="dropdown">Documentation<strong class="caret"></strong>
            </a>
            <ul class="dropdown-menu">
                <li><a href="index">Index</a></li>
                <li><a href="#">Routes</a></li>
                <li><a href="controllers">Controllers</a></li>
                <li><a href="views" >Views</a></li>
                <li><a href="rsi" >RSI</a></li>
            </ul>
        </div>

     <div class="text-right">
       <h2>EMPLOI DOCUMENTATION</h2>
         <p>By Obare C. Brian and David Kirarit</p>
     </div>

<h3>Routes</h3>
<p>The routes directory contains all of the route definitions for  application. By default, several route files are included with Laravel: web.php, api.php, console.php and channels.php.</p>
<p>The <b>api.php</b> file contains routes that the RouteServiceProvider places in the api middleware group, which provides rate limiting.
These routes are intended to be stateless, so requests entering the application through these routes are intended to be authenticated via tokens and will not have access to session state.</p>
<p>The <b>console.php</b> file is where you may define all of your Closure based console commands. Each Closure is bound to a command instance allowing a simple approach to interacting with each command's IO methods. Even though this file does not define HTTP
routes, it defines console based entry points (routes) into the application.</p>
<p>The <b>channels.php</b> file is where you may register all of the event broadcasting channels that your application supports.</p>
<p>The <b>web.php</b> file contains routes that the RouteServiceProvider places in the web middleware group, which provides session state, CSRF protection, and cookie encryption. In this system we have the following web routes;</p>

<ul>
<br><b>Auth::routes();</b><br>
<li>Route::get('/', 'ContactController@index'); ->shows the contact view</li>
<li>Route::get('/registered', 'ContactController@registered'); ->displays the registered job seekers</li>
<li>Route::get('/logout', 'Auth\LoginController@logout'); ->ends a session</li>
<li>Route::get('/home', 'HomeController@index')->name('home'); ->shows the home view</li>
<li>Route::get('profile/add-referee', 'HomeController@addReferee'); ->shows the view to add referee</li>
<li>Route::post('profile/add-referee', 'HomeController@saveReferee'); ->saves the referee details in the database</li><br>


<p>Laravel resource routing assigns the typical "CRUD" routes to a controller with a single line of code.</p>
<li>Route::resource('companies', 'CompanyController'); -><br>
 @index Show the main view<br>
 @create Show the view to create a company<br>
 @store Save a company in database<br>
 @edit Show the view to edit a company<br>
 @update Update company data in database<br>
 @destroy Delete a company in database<br>
</li>
<li>Route::resource('/referrals', 'ReferralController'); -><br>
@index Show the main view<br>
@create Show the view to create a referral<br>
@store Save a referee in database<br>
@edit Show the view to edit a referee<br>
@update Update referee data in database<br>
@destroy Delete a referee in database<br>
</li>


<br>
<p>Route groups allows for sharing route attributes, such as middleware or namespaces, across a large number of routes without needing to define those attributes on each individual route. Shared attributes are specified in an array format as the first parameter
to the Route</p>
<b>Route::group([ 'middleware' => 'auth'], function(){</b><br>
    <li>Route::get('profile', 'HomeController@profile'); ->displays the profile view</li>
    <li>Route::get('profile/edit', 'HomeController@updateProfile'); ->shows the view to edit prifile</li>
    <li>Route::post('profile/update', 'HomeController@saveProfile'); ->update the profile in the database</li>
    <li>Route::resource('profile/invites', 'InviteLinkController'); -><br>
@index Show the main view<br>
@create Show the view to create an invite<br>
@store Save an invite to the database<br>
@edit Show the view for invites<br>
@update Update invites in database<br>
@destroy Delete an invite in database<br>
    </li>
    <li>Route::get('my-blogs','BlogController@admin');
}); ->display my blogs</li>



<br><b>Route::group(['prefix' => 'employers',  'middleware' => 'employer'], function(){</b><br>
    <li>Route::get('dashboard', 'EmployerController@dashboard'); ->displays the employer's dashboard</li>
    <li>Route::get('dashboard-data', 'EmployerController@dashboardData'); -> </li>
    <li>Route::get('jobs', 'EmployerController@jobs');</li>
    <li>Route::get('jobs/active', 'EmployerController@activeJobs');</li>
    <li>Route::get('jobs/other', 'EmployerController@otherJobs');</li>
    <li>Route::get('jobs/shortlisting', 'EmployerController@shortlistingJobs');
});</li>



<br><b>Route::group([ 'middleware' => 'shortlist'], function(){</b><br>
    <li>Route::resource('/employers/cv-requests', 'CvRequestController');
         @index Show the main view<br>
         @create Show the view to create cv request<br>
         @store Save a cv request  <br>
         @edit Show the cv request view<br>
         @update Update cv request in database<br>
         @destroy Delete a cv request in database<br>
     </li>
    <li>Route::resource('/employers/saved', 'SavedProfileController');</li>
    <li>Route::get('/employers/browse', 'EmployerController@browse'); ->shows employers the list of job seekers</li>
   <li>Route::get('/employers/browse/{username}', 'EmployerController@viewSeeker'); ->shows a view for a job seeker with a certain username</li>

   

<br><b>Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){</b><br>
	<li>Route::get('/', 'AdminController@panel')->name('adminpanel') ->displays admin panel view</li>
    <li>Route::get('panel', 'AdminController@panel');  ->displays admin panel </li>
    <li>Route::get('posts', 'AdminController@posts'); ->displays job posts view</li>
    <li>Route::get('posts/{slug}', 'AdminController@viewPost'); ->displays a particular job post</li>
    

<br><b>Route::group(['prefix' => 'job-seekers',  'middleware' => 'seeker'], function(){</b><br>
    <li>Route::get('/', 'SeekerController@toProfile'); ->displays seeker's profile</li>
    <li>Route::get('dashboard', 'SeekerController@dashboard'); ->display seeker's dashboard</li>
    <li>Route::get('feed', 'SeekerController@feed'); 
});</li>


<br><b>Route::group(['prefix' => 'desk',  'middleware' => 'super'], function(){</b><br>
</ul>


    </div>
</div>

@endsection