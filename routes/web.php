<?php

/*
/subscribe
*/
Route::get('/join', 'ContactController@join');

Route::get('/careers', 'ContactController@careers');
Route::get('/contact', 'ContactController@contact');
Route::get('/about', 'ContactController@about');
Route::get('/our-team', 'ContactController@team');
Route::get('/our-clients', 'ContactController@clients');
Route::get('/terms-and-conditions', 'ContactController@terms');
Route::get('/privacy-policy', 'ContactController@policy');
Route::get('/mass-recruitment', 'ContactController@mass_recruitment');
Route::get('/employers/role-suitability-index', 'ContactController@rsi');


Route::post('/contact', 'ContactController@save');

Route::get('/verify-account/{code}', 'RegisterSimpleController@verify');

Route::get('/user/is/registered', 'RegisterSimpleController@checkEmail');

Route::get('/courses/{id}', 'HomeController@getCourse');

Auth::routes();
Route::get('/', 'ContactController@index');
//Route::get('/', function () {   /*dd(\Auth::user()->role );*/ return view('welcome'); 	});
Route::get('/registered', 'ContactController@registered');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/test', 'HomeController@test')->name('test');
Route::get('profile/add-referee', 'HomeController@addReferee');
Route::post('profile/add-referee', 'HomeController@saveReferee');

Route::get('/referees/{slug}', 'RefereeController@assess');
Route::post('/referees/{slug}/save', 'RefereeController@saveAssessment');


Route::resource('/blog', 'BlogController');
Route::resource('companies', 'CompanyController');
Route::resource('/referrals', 'ReferralController');

Route::group([ 'middleware' => 'auth'], function(){
    Route::get('profile', 'HomeController@profile');
    Route::get('profile/edit', 'HomeController@updateProfile');
    Route::post('profile/update', 'HomeController@saveProfile');
});

Route::post('create-account', 'RegisterSimpleController@create');
Route::get('/create-account', 'ContactController@createAcc');
//Route::get('/create-account', function () {       return redirect('/join');    });

Route::group(['prefix' => 'employers',  'middleware' => 'employer'], function(){
    Route::get('dashboard', 'EmployerController@dashboard');
    Route::get('dashboard-data', 'EmployerController@dashboardData');

});
Route::get('/employers/register', 'EmployerController@register');
Route::post('/employers/register', 'EmployerController@create');

//Route::get('/employers/publish', function () {			    	return view('employers.publish');		});

Route::get('/employers/rate-card', 'ContactController@rateCard');
//Route::get('/employers/rate-card', function () {    	return view('employers.rate-card');	});


// *************************
// Route::get('/test', function () {    	return view('new-design.test');	});
// Route::get('/social', function () {    	return view('new-design.test-login');	});
// Route::get('/test-email', function () {    	return view('emails.custom-alt');	});
// Route::get('/email1', function () {    	return view('emails.custom');	});

Route::get('/employers/jobs', 'EmployerController@jobs');
//Route::get('/employers/reviews', 'ContactController@reviews');
//Route::get('/employers/applicants', 'ContactController@applicants');

//Route::get('/employers/reviews', function () {    	return view('employers.dashboard.reviews');	});
//Route::get('/employers/applicants', function () {    	return view('employers.dashboard.applicants');	});
// *************************

Route::get('/employers/premium-recruitment', 'ContactController@precruit');
Route::get('/employers/candidate-vetting', 'ContactController@cvetting');
Route::get('/employers/hr-services', 'ContactController@hrservices');
Route::get('/employers', 'ContactController@employersIndex');

Route::group([ 'middleware' => 'shortlist'], function(){
    Route::resource('/employers/saved', 'SavedProfileController');
    Route::get('/employers/browse', 'EmployerController@browse');
    Route::get('/employers/browse/{username}', 'EmployerController@viewSeeker');
    Route::post('/employers/shortlist', 'EmployerController@applyForUser');
    Route::get('/employers/applications/{slug}', 'EmployerController@applications');
    Route::get('/employers/applications/{slug}/rsi', 'EmployerController@rsi');
    Route::post('/employers/applications/{slug}/rsi', 'EmployerController@saveRsi');
    Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@toggleShortlist');
    Route::get('/employers/reject-toggle/{slug}/{username}', 'EmployerController@toggleReject');
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

    Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees', 'EmployerController@referees');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/add', 'EmployerController@addReferee');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/request', 'EmployerController@requestReferee');
    Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/toggle', 'EmployerController@toggleReferees');

    Route::get('/employers/applications/{slug}/{applicationId}/rsi/company-sizes', 'EmployerController@cosizes');
    Route::post('/employers/applications/{slug}/{applicationId}/rsi/company-sizes', 'EmployerController@saveCosizes');

    Route::get('/employers/browse/{username}/request-cv', 'EmployerController@cvRequest');
});


//Route::get('/employers/applications/{slug}/shortlist', 'EmployerController@shortlisted')->middleware('shortlist');



Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){
	//Route::get('/', function () {   return redirect('/admin/panel');});
    Route::get('/', 'AdminController@panel');
    Route::get('panel', 'AdminController@panel');
    Route::get('posts', 'AdminController@posts');
    Route::post('posts/{slug}/update', 'AdminController@updatePost');
    Route::get('blog','AdminController@blog');
    Route::get('seekers/{username?}','AdminController@seekers');
    Route::get('cv-requests/{id?}','AdminController@cvRequests');
    //Route::resource('posts', 'PostsController');
    Route::get('emails', 'AdminController@emails');
    Route::post('emails/send', 'AdminController@sendEmails');
    Route::get('contacts', 'AdminController@contacts');
    Route::post('saveResolution', 'AdminController@saveResolution');

    Route::get('employers', 'AdminController@employers');
    Route::post('log-in-as', 'AdminController@loginas');

    Route::get('received-requests/{id?}', 'AdvertController@index');
    Route::post('received-requests/{id}', 'AdvertController@saveNotes');
});



Route::group(['prefix' => 'job-seekers',  'middleware' => 'seeker'], function(){
    //Route::get('/', function () {      return redirect('/profile'); });
    Route::get('/', 'SeekerController@toProfile');
    Route::get('dashboard', 'SeekerController@dashboard');
    Route::get('feed', 'SeekerController@feed');
});

Route::get('/job-seekers/cv-editing', 'ContactController@cvediting');
Route::get('/job-seekers/cv-templates', 'ContactController@cvtemplates')->middleware('auth');
Route::get('/job-seekers/premium-placement', 'ContactController@pplacement');
Route::get('/job-seekers/services', 'ContactController@jservices');

//Route::get('/employers/services', function () {      return view('employers.services');});
Route::get('/employers/services', 'ContactController@eservices');
Route::get('/employers/background-checks', 'ContactController@bkgtests');
Route::get('/employers/iq-tests', 'ContactController@iqtests');
Route::get('/employers/proficiency-tests', 'ContactController@proficiency');
Route::get('/employers/psychometric-tests', 'ContactController@psychometric');
Route::get('/employers/train-employees', 'ContactController@retrain');


Route::resource('/vacancies', 'PostsController');
Route::get('/employers/publish', 'ContactController@epublish');
Route::post('/employers/publish', 'AdvertController@store');
Route::get('/vacancies/{slug}/apply','PostsController@apply')->middleware('seeker');
Route::post('/vacancies/{slug}/apply','JobApplicationController@accept')->middleware('seeker');
Route::get('/profile/applications/{id?}','SeekerController@applications')->middleware('seeker');
Route::get('/profile/referees/{id?}','RefereeController@view')->middleware('seeker');

Route::get('/vacancies/{slug}/deactivate','PostsController@deactivate')->middleware('employer');
Route::get('/vacancies/{slug}/activate','PostsController@activate')->middleware('employer');
//Route::get('/employers/publish', 'PostsController@create')->middleware('auth'); //create

Route::group(['prefix' => 'desk',  'middleware' => 'super'], function(){
    Route::get('admins', 'SuperAdminController@admins');
    Route::get('create-admin', 'SuperAdminController@create');
    Route::post('create-admin', 'SuperAdminController@saveAdmin');
    Route::get('enable-admin', 'SuperAdminController@enable');
    Route::get('disable-admin', 'SuperAdminController@disable');
});

Route::get('auth-with/{provider}', 'SocialiteController@redirectToProvider');
Route::get('auth-with/{provider}/callback', 'SocialiteController@handleProviderCallback');

Route::get('/unsubscribe/{email}', 'EmailController@unsubscribe')->name('unsubscribe');
Route::get('/subscribe/{email}', 'EmailController@subscribe')->name('subscribe');


Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap/posts.xml', 'SitemapController@posts');
Route::get('/sitemap/blogs.xml', 'SitemapController@blogs');