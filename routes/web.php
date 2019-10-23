<?php

/*
/subscribe
*/

Route::get('/careers', function () {    			return view('pages.careers');			});
Route::get('/contact', function () {    			return view('pages.contact');			});
Route::get('/about', function () {	    			return view('pages.about');				});
Route::get('/our-team', function () {   			return view('pages.team');				});
Route::get('/our-clients', function () {			return view('pages.clients');			});
Route::get('/terms-and-conditions', function () {   return view('pages.terms');				});
Route::get('/privacy-policy', function () {		    return view('pages.privacy-policy');	});
Route::get('/mass-recruitment', function () {       return view('pages.mass-recruitment');    });

Route::post('/contact', 'ContactController@save');


Auth::routes();
Route::get('/', 'ContactController@index');
//Route::get('/', function () {   /*dd(\Auth::user()->role );*/ return view('welcome'); 	});
Route::get('/registered', function () {    return view('seekers.registered');	});
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/test', 'HomeController@test')->name('test');


Route::resource('/blog', 'BlogController');

Route::group([ 'middleware' => 'auth'], function(){
    Route::get('profile', 'HomeController@profile');
    Route::resource('companies', 'CompanyController');
    Route::get('profile/edit', 'HomeController@updateProfile');
    Route::post('profile/update', 'HomeController@saveProfile');
});

Route::group(['prefix' => 'employers',  'middleware' => 'employer'], function(){
    Route::get('dashboard', 'EmployerController@dashboard');
    
});
Route::get('/employers/register', 'EmployerController@register');
Route::post('/employers/register', 'EmployerController@create');

//Route::get('/employers/publish', function () {			    	return view('employers.publish');		});
Route::get('/employers/premium-recruitment', function () {    	return view('employers.p-recruitment');	});
Route::get('/employers/candidate-vetting', function () {	    return view('employers.c-vetting');		});
Route::get('/employers/hr-services', function () {		    	return view('employers.hr-services');	});
Route::get('/employers', function () {                return redirect('/employers/publish');           });

Route::group([ 'middleware' => 'shortlist'], function(){
    Route::get('/employers/browse', 'EmployerController@browse');
    Route::get('/employers/browse/{username}', 'EmployerController@viewSeeker');
    Route::post('/employers/shortlist', 'EmployerController@applyForUser');
    Route::get('/employers/applications/{slug}', 'EmployerController@applications');
    Route::get('/employers/applications/{slug}/rsi', 'EmployerController@rsi');
    Route::post('/employers/applications/{slug}/rsi', 'EmployerController@saveRsi');
    Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@toggleShortlist');
    Route::get('/employers/applications/{slug}/close', 'EmployerController@closeJob');
    Route::post('/employers/applications/{slug}/close', 'EmployerController@saveCandidate');
    Route::get('/employers/applications/{slug}/invite', 'EmployerController@invite');

    Route::get('/employers/applications/{slug}/{applicationId}/cover', 'EmployerController@viewCover');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi', 'EmployerController@candidateRsi');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi/interview', 'EmployerController@inputInterview');
    Route::post('/employers/applications/{slug}/{applicationId}/rsi/interview', 'EmployerController@saveInterview');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi/iq', 'EmployerController@inputIq');
    Route::post('/employers/applications/{slug}/{applicationId}/rsi/iq', 'EmployerController@saveIq');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi/psychometric', 'EmployerController@inputPsy');
    Route::post('/employers/applications/{slug}/{applicationId}/rsi/psychometric', 'EmployerController@savePsy');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi/personality', 'EmployerController@inputPers');
    Route::post('/employers/applications/{slug}/{applicationId}/rsi/personality', 'EmployerController@savePers');
});


//Route::get('/employers/applications/{slug}/shortlist', 'EmployerController@shortlisted')->middleware('shortlist');



Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){
	Route::get('/', function () {   return redirect('/admin/panel');});
    Route::get('panel', 'AdminController@panel');
    Route::get('posts', 'AdminController@posts');
    Route::post('posts/{slug}/update', 'AdminController@updatePost');
    Route::get('blog','AdminController@blog');
    //Route::resource('posts', 'PostsController');
});



Route::group(['prefix' => 'job-seekers',  'middleware' => 'seeker'], function(){
    Route::get('/', function () {      return redirect('/profile'); });
    //Route::get('dashboard', 'SeekerController@dashboard');
});
Route::get('/job-seekers/cv-editing', function () {			    return view('seekers.cv-editing');		});
Route::get('/job-seekers/cv-templates', function () {		    return view('seekers.cv-templates');	})->middleware('auth');
Route::get('/job-seekers/premium-placement', function () {	    return view('seekers.premium-placement');});

Route::resource('/vacancies', 'PostsController');
Route::get('/employers/publish', function () {                return view('employers.publish');           });
Route::get('/vacancies/{slug}/apply','PostsController@apply')->middleware('seeker');
Route::post('/vacancies/{slug}/apply','JobApplicationController@accept')->middleware('seeker');
//Route::get('/employers/publish', 'PostsController@create')->middleware('auth'); //create

Route::group(['prefix' => 'desk',  'middleware' => 'super'], function(){
    Route::get('admins', 'SuperAdminController@admins');
    Route::get('create-admin', 'SuperAdminController@create');
    Route::post('create-admin', 'SuperAdminController@saveAdmin');
    Route::get('enable-admin', 'SuperAdminController@enable');
    Route::get('disable-admin', 'SuperAdminController@disable');
});







