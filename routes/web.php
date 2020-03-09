<?php

/*
/subscribe
*/
Route::get('/robots.txt', 'ContactController@robotsFile');
Route::get('/ads.txt', 'ContactController@googleAdsFile');

Route::get('/browser-sessions/{endpoint}', 'SessionController@browserSessions');

Route::get('/join', 'ContactController@join');
Route::get('/invites/{slug}', 'ContactController@invited');
Route::get('/checkout', 'PesapalController@checkout');
Route::post('/checkout', 'PesapalController@checkout');

Route::get('/careers', 'ContactController@careers');
Route::get('/contact', 'ContactController@contact');
Route::get('/about', 'ContactController@about');
Route::get('/our-team', 'ContactController@team');
Route::get('/our-clients', 'ContactController@clients');
Route::get('/terms-and-conditions', 'ContactController@terms');
Route::get('/privacy-policy', 'ContactController@policy');
Route::get('/mass-recruitment', 'ContactController@mass_recruitment');
Route::get('/employers/role-suitability-index', 'ContactController@rsi');

Route::get('/webmail', 'ContactController@webmail');
Route::get('/cpanel', 'ContactController@cpanel');
Route::get('/referral-credits', 'ContactController@referralCredits');

Route::post('/contact', 'ContactController@save')->middleware(\Spatie\Honeypot\ProtectAgainstSpam::class);

Route::get('/verify-account/{code}', 'RegisterSimpleController@verify');

Route::get('/user/is/registered', 'RegisterSimpleController@checkEmail');

Route::get('/courses/{id}', 'HomeController@getCourse');

Route::get('/invoice', 'ContactController@indexRedirect');
Route::post('/invoice', 'InvoiceController@productCheckout');
Route::get('/invoice/{slug}', 'InvoiceController@show');
Route::get('/invoice/{slug}/paid', 'InvoiceController@payment');
Route::post('/invoice/{slug}/pay', 'PesapalController@pay');
Route::get('/invoice/{slug}/pay', 'PesapalController@payRedirect');
Route::get('/pesapalNotifications','PesapalController@ipn');

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

Route::get('likes/{target}/{slug}', 'HomeController@toggleLike');


Route::resource('/blog', 'BlogController');
Route::post('/blog/comment/{id}','BlogController@comment')->middleware('auth');
Route::resource('companies', 'CompanyController');
Route::get('companies/{name}/make-featured', 'CompanyController@makeFeatured');
Route::resource('/referrals', 'ReferralController');
Route::post('/referrals/processCSV','ReferralController@processCSV')->name('processCSV');
Route::get('/referrals/processCSV','ReferralController@processCSVRedirect');
Route::resource('/cv-editing', 'CvEditController');

Route::group([ 'middleware' => 'auth'], function(){
    Route::get('profile', 'HomeController@profile');
    Route::get('profile/edit', 'HomeController@updateProfile');
    Route::post('profile/update', 'HomeController@saveProfile');
    Route::resource('profile/invites', 'InviteLinkController');
    Route::get('my-blogs','BlogController@admin');
});

Route::post('create-account', 'RegisterSimpleController@create')->middleware(\Spatie\Honeypot\ProtectAgainstSpam::class);
Route::get('/create-account', 'ContactController@createAcc');
//Route::get('/create-account', function () {       return redirect('/join');    });

Route::group(['prefix' => 'employers',  'middleware' => 'employer'], function(){
    Route::get('dashboard', 'EmployerController@dashboard');
    Route::get('dashboard-data', 'EmployerController@dashboardData');
    Route::get('dashboard-stats', 'EmployerController@dashboardStats');
    Route::get('dashboard-chartData', 'EmployerController@dashboardChartData');
    Route::get('jobs', 'EmployerController@jobs');
    Route::get('jobs/active', 'EmployerController@activeJobs');
    Route::get('jobs/other', 'EmployerController@otherJobs');
    Route::get('jobs/shortlisting', 'EmployerController@shortlistingJobs');

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
    Route::resource('/employers/cv-requests', 'CvRequestController');
    Route::resource('/employers/saved', 'SavedProfileController');
    Route::get('/employers/browse', 'EmployerController@browse');
    Route::get('/employers/browse/{username}', 'EmployerController@viewSeeker');
    Route::post('/employers/shortlist', 'EmployerController@applyForUser');
    
    Route::get('/employers/applications/{slug}/rsi', 'EmployerController@rsi');
    Route::post('/employers/applications/{slug}/rsi', 'EmployerController@saveRsi');
    Route::get('/employers/applications/{slug}/', 'EmployerController@applications');
    
    Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@toggleShortlist');
    Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@shortlistSeekerToggle');
    Route::get('/employers/reject-toggle/{slug}/{username}', 'EmployerController@toggleReject');
    Route::get('/employers/applications/{slug}/close', 'EmployerController@closeJob');
    Route::post('/employers/applications/{slug}/close', 'EmployerController@saveCandidate');
    Route::get('/employers/applications/{slug}/invite', 'EmployerController@invite');
    Route::get('/employers/applications/{slug}/{endpoint}', 'EmployerController@applications');
    // Route::get('/employers/applications/{slug}/share', 'EmployerController@shareJob');
    // Route::post('/employers/applications/{slug}/share', 'EmployerController@shareJobNow');

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
    Route::get('/', 'AdminController@panel')->name('adminpanel');
    Route::get('panel', 'AdminController@panel');
    Route::get('posts', 'AdminController@posts');
    Route::get('posts/{slug}', 'AdminController@viewPost');
    Route::post('posts/{slug}/update', 'AdminController@updatePost');
    Route::get('blog','AdminController@blog');
    Route::resource('bloggers','BloggersController');
    Route::get('seekers/{username?}','AdminController@seekers');
    Route::get('cv-requests/{id?}','AdminController@cvRequests');
    //Route::resource('posts', 'PostsController');
    Route::get('vacancy-emails', 'AdminController@vacancyEmails');
    Route::get('emails', 'AdminController@emails');
    Route::post('emails/send', 'AdminController@sendEmails');
    Route::post('emails/preview', 'AdminController@previewEmail');
    Route::get('contacts', 'AdminController@contacts');
    Route::post('saveResolution', 'AdminController@saveResolution');
    Route::get('metrics', 'AdminController@seekerMetrics');
    Route::resource('cveditors','EditorController');
    Route::get('cv-edit-requests/{id?}', 'AdminController@editingRequests');
    Route::post('cv-edit-requests/{id}/assign', 'AdminController@assignEditingRequests');
    Route::resource('industries', 'IndustryController');
    Route::get('employers', 'AdminController@employers');
    Route::get('companies', 'AdminController@companies');
    Route::post('log-in-as', 'AdminController@loginas');
    Route::get('username/{username}', 'AdminController@loginWithUsername');

    Route::resource('job-post-groups', 'PostGroupController');
    Route::resource('countries', 'CountryController');
    Route::resource('locations', 'LocationController');
    Route::resource('faqs', 'FaqController');

    Route::resource('unregistered-users', 'UnregisteredUsersController');
    Route::post('unregistered-users/import', 'UnregisteredUsersController@import');

    Route::get('received-requests/{id?}', 'AdvertController@index');
    Route::post('received-requests/{id}', 'AdvertController@saveNotes');

    Route::post('toggle-seeker-featured', 'AdminController@toggleSeekerFeatured');

    Route::resource('products','ProductController');
    Route::resource('invoices','InvoiceController');
    Route::post('invoices/{slug}/remindViaEmail', 'InvoiceController@remindViaEmail');
    Route::get('invoices/{slug}/remindViaEmail', 'InvoiceController@show');
    Route::get('/how-to', 'AdminController@adminFaqs');
});



Route::group(['prefix' => 'job-seekers',  'middleware' => 'seeker'], function(){
    //Route::get('/', function () {      return redirect('/profile'); });
    Route::get('/', 'SeekerController@toProfile');
    Route::get('dashboard', 'SeekerController@dashboard');
    Route::get('feed', 'SeekerController@feed');
});

Route::get('/jobsikaz', 'RegisterSimpleController@seeker');
Route::get('/jobseekers', 'RegisterSimpleController@seeker');
Route::get('/jobseeker', 'RegisterSimpleController@seeker');
Route::get('/job-seekers', 'RegisterSimpleController@seeker');
Route::get('/jobseekers/register', 'RegisterSimpleController@seeker');
Route::get('/job-seekers/register', 'RegisterSimpleController@seeker');
Route::get('/job-seekers/cv-editing', 'ContactController@cvediting');
Route::get('/job-seekers/cv-templates', 'ContactController@cvtemplates')->middleware('auth');
Route::get('/job-seekers/premium-placement', 'ContactController@pplacement');
Route::get('/job-seekers/services', 'ContactController@jservices');
Route::get('/job-seekers/faqs', 'ContactController@jobSeekerFaqs');
Route::get('/job-seekers/cv-builder', 'ContactController@cvBuilder');
Route::post('/job-seekers/cv-builder/download', 'ContactController@cvBuilderDownload');

Route::get('/job-seekers/get-featured', 'ContactController@getFeatured');
Route::get('/job-seekers/get-alerts', 'ContactController@getAlerts');

//Route::get('/employers/services', function () {      return view('employers.services');});
Route::get('/employers/services', 'ContactController@eservices');
Route::get('/employers/background-checks', 'ContactController@bkgtests');
Route::get('/employers/iq-tests', 'ContactController@iqtests');
Route::get('/employers/proficiency-tests', 'ContactController@proficiency');
Route::get('/employers/psychometric-tests', 'ContactController@psychometric');
Route::get('/employers/train-employees', 'ContactController@retrain');
Route::get('/employers/faqs', 'ContactController@employerFaqs');


Route::resource('/vacancies', 'PostsController');
Route::get('/employers/publish', 'ContactController@epublish');
Route::post('/employers/publish', 'AdvertController@store');
Route::get('/vacancies/{slug}/apply','PostsController@apply')->middleware('seeker');
Route::post('/vacancies/{slug}/apply','JobApplicationController@accept')->middleware('seeker');
Route::get('/profile/applications/{id?}','SeekerController@applications')->middleware('seeker');
Route::get('/profile/referees/{id?}','RefereeController@view')->middleware('seeker');
Route::post('/apply-easy/{slug}','ContactController@easyApply')->middleware('guest');

Route::get('/vacancies/{slug}/deactivate','PostsController@deactivate')->middleware('employer');
Route::get('/vacancies/{slug}/activate','PostsController@activate')->middleware('employer');
//Route::get('/employers/publish', 'PostsController@create')->middleware('auth'); //create

Route::group(['prefix' => 'desk',  'middleware' => 'super'], function(){
    Route::get('admins', 'SuperAdminController@admins');
    Route::get('create-admin', 'SuperAdminController@create');
    Route::post('create-admin', 'SuperAdminController@saveAdmin');
    Route::get('enable-admin', 'SuperAdminController@enable');
    Route::get('disable-admin', 'SuperAdminController@disable');
   /* Route::get('documentation/{endpoint?}',  'SuperAdminController@document');*/
    Route::resource('documentation', 'DocumentationController');
    Route::post('documentation/search','DocumentationController@search')->name('search');
});

Route::get('auth-with/{provider}', 'SocialiteController@redirectToProvider');
Route::get('auth-with/{provider}/callback', 'SocialiteController@handleProviderCallback');

Route::get('/unsubscribe/{email}', 'EmailController@unsubscribe')->name('unsubscribe');
Route::get('/subscribe/{email}', 'EmailController@subscribe')->name('subscribe');


Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap/posts.xml', 'SitemapController@posts');
Route::get('/sitemap/blogs.xml', 'SitemapController@blogs');