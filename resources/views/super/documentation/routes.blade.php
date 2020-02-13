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
<p>The <b>api.php</b> file contains routes that the RouteServiceProvider places in the api middleware group, which provides rate limiting.
These routes are intended to be stateless, so requests entering the application through these routes are intended to be authenticated via tokens and will not have access to session state.</p>
<p>The <b>console.php</b> file is where you may define all of your Closure based console commands. Each Closure is bound to a command instance allowing a simple approach to interacting with each command's IO methods. Even though this file does not define HTTP
routes, it defines console based entry points (routes) into the application.</p>
<p>The <b>channels.php</b> file is where you may register all of the event broadcasting channels that your application supports.</p>
<p>The <b>web.php</b> file contains routes that the RouteServiceProvider places in the web middleware group, which provides session state, CSRF protection, and cookie encryption. In this system we have the following web routes;</p> 
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

<li>Route::get('/webmail', 'ContactController@webmail'); ->displays the webmail</li>
<li>Route::get('/cpanel', 'ContactController@cpanel'); ->displays the cpanel</li>

<li>Route::post('/contact', 'ContactController@save'); ->saves the contact message from the client

<li>Route::get('/verify-account/{code}', 'RegisterSimpleController@verify'); ->retrieves verification code</li>

<li>Route::get('/user/is/registered', 'RegisterSimpleController@checkEmail'); ->displays if an email is registered</li>

<li>Route::get('/courses/{id}', 'HomeController@getCourse'); ->displays courses</li>

<li>Route::get('/invoice/{slug}', 'InvoiceController@show'); ->retrieves invoice with a certain number</li>
<li>Route::get('/invoice/payment', 'InvoiceController@payment'); ->displays payment for invoice</li>
<li>Route::post('/invoice/{slug}/pay', 'PesapalController@pay'); ->sends the payment</li>
<li>Route::get('/invoice/{slug}/pay', 'PesapalController@payRedirect'); ->shows the view for invoice payment with a certain ID.</li>

<li>Route::get('/pesapalNotifications','PesapalController@ipn'); ->shows the pesapal notifications</li>

<br><b>Auth::routes();</b><br>
<li>Route::get('/', 'ContactController@index'); ->shows the contact view</li>
<li>Route::get('/registered', 'ContactController@registered'); ->displays the registered job seekers</li>
<li>Route::get('/logout', 'Auth\LoginController@logout'); ->ends a session</li>
<li>Route::get('/home', 'HomeController@index')->name('home'); ->shows the home view</li>
<li>Route::get('profile/add-referee', 'HomeController@addReferee'); ->shows the view to add referee</li>
<li>Route::post('profile/add-referee', 'HomeController@saveReferee'); ->saves the referee details in the database</li><br>

<li>Route::get('/referees/{slug}', 'RefereeController@assess'); ->shows the referee with a certain ID</li>
<li>Route::post('/referees/{slug}/save', 'RefereeController@saveAssessment'); ->saves assessment to the database</li>
<li>Route::get('likes/{target}/{slug}', 'HomeController@toggleLike');</li>
<li>Route::resource('/blog', 'BlogController'); -><br>
 @index Show the main view<br>
 @create Show the view to create a blog<br>
 @store Save a blog in database<br>
 @edit Show the view to edit a blog<br>
 @update Update blog data in database<br>
 @destroy Delete a blog in database<br></li>
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
<li>Route::resource('/cv-editing', 'CvEditController'); -><br>
@index Show the main view<br>
@create Show the view to create cv editing request<br>
@store Save a cv editing request in database<br>
@edit Show the view to edit cv editor<br>
@update Update cv data in database<br>
@destroy Delete a cv editing request in database<br>
</li>

<br><b>Route::group([ 'middleware' => 'auth'], function(){</b><br>
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

<li>Route::post('create-account', 'RegisterSimpleController@create'); ->send the registration to the database</li>
<li>Route::get('/create-account', 'ContactController@createAcc'); ->shows the page for new registrations</li>

<br><b>Route::group(['prefix' => 'employers',  'middleware' => 'employer'], function(){</b><br>
    <li>Route::get('dashboard', 'EmployerController@dashboard'); ->displays the employer's dashboard</li>
    <li>Route::get('dashboard-data', 'EmployerController@dashboardData'); -> </li>
    <li>Route::get('jobs', 'EmployerController@jobs');</li>
    <li>Route::get('jobs/active', 'EmployerController@activeJobs');</li>
    <li>Route::get('jobs/other', 'EmployerController@otherJobs');</li>
    <li>Route::get('jobs/shortlisting', 'EmployerController@shortlistingJobs');
});</li>

<li>Route::get('/employers/register', 'EmployerController@register'); ->display view for employer registration</li>
<li>Route::post('/employers/register', 'EmployerController@create'); ->send the employer registration data to the database</li>

<li>Route::get('/employers/rate-card', 'ContactController@rateCard'); ->shows the employers rate-card view</li>

<li>Route::get('/employers/premium-recruitment', 'ContactController@precruit'); ->shows the premium recrutment view</li>
<li>Route::get('/employers/candidate-vetting', 'ContactController@cvetting'); ->shows the candidate vetting view</li>
<li>Route::get('/employers/hr-services', 'ContactController@hrservices'); ->shows hr-services view</li>
<li>Route::get('/employers', 'ContactController@employersIndex'); ->displays advertisement view for employers</li>

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
    <li>Route::post('/employers/shortlist', 'EmployerController@applyForUser'); </li>
    <li>Route::get('/employers/applications/{slug}', 'EmployerController@applications');</li>
    <li>Route::get('/employers/applications/{slug}/rsi', 'EmployerController@rsi');</li>
    <li>Route::post('/employers/applications/{slug}/rsi', 'EmployerController@saveRsi');</li>
    <li>Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@toggleShortlist');</li>
    <li>Route::get('/employers/reject-toggle/{slug}/{username}', 'EmployerController@toggleReject');</li>
    <li>Route::get('/employers/applications/{slug}/close', 'EmployerController@closeJob');</li>
    <li>Route::post('/employers/applications/{slug}/close', 'EmployerController@saveCandidate');</li>
    <li>Route::get('/employers/applications/{slug}/invite', 'EmployerController@invite');</li>

     <li>Route::get('/employers/applications/{slug}/{applicationId}/cover', 'EmployerController@viewCover');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi', 'EmployerController@candidateRsi');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/interview', 'EmployerController@inputInterview');</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/interview', 'EmployerController@saveInterview');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/iq', 'EmployerController@inputIq');</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/iq', 'EmployerController@saveIq');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/psychometric', 'EmployerController@inputPsy');</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/psychometric', 'EmployerController@savePsy');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/personality', 'EmployerController@inputPers');</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/personality', 'EmployerController@savePers');</li>

    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees', 'EmployerController@referees');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/add', 'EmployerController@addReferee');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/request', 'EmployerController@requestReferee');</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/toggle', 'EmployerController@toggleReferees');</li>

    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/company-sizes', 'EmployerController@cosizes');</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/company-sizes', 'EmployerController@saveCosizes');</li>

    <li>Route::get('/employers/browse/{username}/request-cv', 'EmployerController@cvRequest');
});</li>

<br><b>Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){</b><br>
	<li>Route::get('/', 'AdminController@panel')->name('adminpanel')</li>
    <li>Route::get('panel', 'AdminController@panel');</li>
    <li>Route::get('posts', 'AdminController@posts');</li>
    <li>Route::get('posts/{slug}', 'AdminController@viewPost');</li>
    <li>Route::post('posts/{slug}/update', 'AdminController@updatePost');</li>
    <li>Route::get('blog','AdminController@blog');</li>
    <li>Route::resource('bloggers','BloggersController');</li>
    <li>Route::get('seekers/{username?}','AdminController@seekers');</li>
    <li>Route::get('cv-requests/{id?}','AdminController@cvRequests');</li>

    <li>Route::get('vacancy-emails', 'AdminController@vacancyEmails');</li>
    <li>Route::get('emails', 'AdminController@emails');</li>
    <li>Route::post('emails/send', 'AdminController@sendEmails');</li>
    <Li>Route::get('contacts', 'AdminController@contacts');</Li>
    <li>Route::post('saveResolution', 'AdminController@saveResolution');</li>
    <li>Route::get('metrics', 'AdminController@seekerMetrics');</li>
    <li>Route::resource('cveditors','EditorController');</li>
    <li>Route::get('cv-edit-requests/{id?}', 'AdminController@editingRequests');</li>
    <li>Route::post('cv-edit-requests/{id}/assign', 'AdminController@assignEditingRequests');</li>
    <li>Route::resource('industries', 'IndustryController');</li>
    <li>Route::get('employers', 'AdminController@employers');</li>
    <li>Route::get('companies', 'AdminController@companies');</li>
    <li>Route::post('log-in-as', 'AdminController@loginas');</li>
    <li>Route::get('username/{username}', 'AdminController@loginWithUsername');</li>

    <li>Route::resource('job-post-groups', 'PostGroupController');</li>
    <li>Route::resource('countries', 'CountryController');</li>
    <li>Route::resource('locations', 'LocationController');</li>
    <li>Route::resource('faqs', 'FaqController');</li>

    <li>Route::resource('unregistered-users', 'UnregisteredUsersController');</li>
    <li>Route::post('unregistered-users/import', 'UnregisteredUsersController@import');</li>

    <li>Route::get('received-requests/{id?}', 'AdvertController@index');</li>
    <li>Route::post('received-requests/{id}', 'AdvertController@saveNotes');</li>

    <li>Route::post('toggle-seeker-featured', 'AdminController@toggleSeekerFeatured');</li>

    <li>Route::resource('products','ProductController');</li>
    <li>Route::resource('invoices','InvoiceController');</li>
    <li>Route::post('invoices/{slug}/remindViaEmail', 'InvoiceController@remindViaEmail');</li>
    <li>Route::get('invoices/{slug}/remindViaEmail', 'InvoiceController@show');
});</li>



<br><b>Route::group(['prefix' => 'job-seekers',  'middleware' => 'seeker'], function(){</b><br>
    <li>Route::get('/', 'SeekerController@toProfile');</li>
    <li>Route::get('dashboard', 'SeekerController@dashboard');</li>
    <li>Route::get('feed', 'SeekerController@feed');
});</li>

<li>Route::get('/job-seekers/cv-editing', 'ContactController@cvediting');</li>
<li>Route::get('/job-seekers/cv-templates', 'ContactController@cvtemplates')->middleware('auth');</li>
<li>Route::get('/job-seekers/premium-placement', 'ContactController@pplacement');</li>
<li>Route::get('/job-seekers/services', 'ContactController@jservices');</li>
<li>Route::get('/job-seekers/faqs', 'ContactController@jobSeekerFaqs');</li>


<li>Route::get('/employers/services', 'ContactController@eservices');</li>
<li>Route::get('/employers/background-checks', 'ContactController@bkgtests');</li>
<li>Route::get('/employers/iq-tests', 'ContactController@iqtests');</li>
<Li>Route::get('/employers/proficiency-tests', 'ContactController@proficiency');</Li>
<li>Route::get('/employers/psychometric-tests', 'ContactController@psychometric');</li>
<li>Route::get('/employers/train-employees', 'ContactController@retrain');</li>
<li>Route::get('/employers/faqs', 'ContactController@employerFaqs');</li>


<li>Route::resource('/vacancies', 'PostsController');</li>
<li>Route::get('/employers/publish', 'ContactController@epublish');</li>
<li>Route::post('/employers/publish', 'AdvertController@store');</li>
<li>Route::get('/vacancies/{slug}/apply','PostsController@apply')->middleware('seeker');</li>
<li>Route::post('/vacancies/{slug}/apply','JobApplicationController@accept')->middleware('seeker');</li>
<li>Route::get('/profile/applications/{id?}','SeekerController@applications')->middleware('seeker');</li>
<li>Route::get('/profile/referees/{id?}','RefereeController@view')->middleware('seeker');</li>
<li>Route::post('/apply-easy/{slug}','ContactController@easyApply')->middleware('guest');</li>

<li>Route::get('/vacancies/{slug}/deactivate','PostsController@deactivate')->middleware('employer');</li>
<li>Route::get('/vacancies/{slug}/activate','PostsController@activate')->middleware('employer');</li>

<br><b>Route::group(['prefix' => 'desk',  'middleware' => 'super'], function(){</b><br>
    <li>Route::get('admins', 'SuperAdminController@admins');</li>
    <li>Route::get('create-admin', 'SuperAdminController@create');</li>
    <li>Route::post('create-admin', 'SuperAdminController@saveAdmin');</li>
    <li>Route::get('enable-admin', 'SuperAdminController@enable');</li>
    <li>Route::get('disable-admin', 'SuperAdminController@disable');</li>
    <li>Route::get('documentation/{endpoint?}',  'SuperAdminController@document');
});</li>

<li>Route::get('auth-with/{provider}', 'SocialiteController@redirectToProvider');</li>
<li>Route::get('auth-with/{provider}/callback', 'SocialiteController@handleProviderCallback');</li>

<li>Route::get('/unsubscribe/{email}', 'EmailController@unsubscribe')->name('unsubscribe');</li>
<li>Route::get('/subscribe/{email}', 'EmailController@subscribe')->name('subscribe');</li>


<li>Route::get('/sitemap.xml', 'SitemapController@index');</li>
<li>Route::get('/sitemap/posts.xml', 'SitemapController@posts');</li>
<li>Route::get('/sitemap/blogs.xml', 'SitemapController@blogs');</li>
</ul>

</p>


    </div>
</div>

@endsection