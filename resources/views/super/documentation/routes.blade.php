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

   <li>Route::post('/employers/shortlist', 'EmployerController@applyForUser'); ->sends the data of a job seeker shortlisted by the employer to the database</li>
    <li>Route::get('/employers/applications/{slug}', 'EmployerController@applications'); ->displays a particuar candidate shortlisted by the employer</li>
    <li>Route::get('/employers/applications/{slug}/rsi', 'EmployerController@rsi'); ->displays RSI of a particular candidate</li>
    <li>Route::post('/employers/applications/{slug}/rsi', 'EmployerController@saveRsi'); ->Sends RSI of a particular candidate to the database</li>
    <li>Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@toggleShortlist'); ->display the view to check if a particular candidate is shortlisted</li>
    <li>Route::get('/employers/reject-toggle/{slug}/{username}', 'EmployerController@toggleReject'); ->display the view to check if a particular candidate is rejected</li>
    <li>Route::get('/employers/applications/{slug}/close', 'EmployerController@closeJob'); ->displays the view for an employer to close a particular job</li>
    <li>Route::post('/employers/applications/{slug}/close', 'EmployerController@saveCandidate');</li>
    <li>Route::get('/employers/applications/{slug}/invite', 'EmployerController@invite'); ->displays the view with seekers invited by employers for certain application</li>

     <li>Route::get('/employers/applications/{slug}/{applicationId}/cover', 'EmployerController@viewCover'); ->displays the view for showing cover letter for a specific candidate</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi', 'EmployerController@candidateRsi'); ->displays the view for  acandidate RSI</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/interview', 'EmployerController@inputInterview'); ->display view for candidates's interview score</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/interview', 'EmployerController@saveInterview'); ->saves candidate's interview score</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/iq', 'EmployerController@inputIq'); ->displays the view for candidate's IQ score</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/iq', 'EmployerController@saveIq'); ->saves candidate's IQ score</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/psychometric', 'EmployerController@inputPsy'); ->displays the view for candidate's psychometric score</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/psychometric', 'EmployerController@savePsy'); ->saves candidate's psychometric score</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/personality', 'EmployerController@inputPers'); ->displays the view for candidate's personality score</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/personality', 'EmployerController@savePers'); ->saves candidate's personality score</li>

    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees', 'EmployerController@referees'); ->displays the list of referees</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/add', 'EmployerController@addReferee'); ->displays the view to add a referee</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/request', 'EmployerController@requestReferee'); ->displays view to request for a referee</li>
    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/referees/toggle', 'EmployerController@toggleReferees'); ->display view to select a referee</li>

    <li>Route::get('/employers/applications/{slug}/{applicationId}/rsi/company-sizes', 'EmployerController@cosizes'); ->displays view for adding company size</li>
    <li>Route::post('/employers/applications/{slug}/{applicationId}/rsi/company-sizes', 'EmployerController@saveCosizes'); ->sends company size to database</li>

    <li>Route::get('/employers/browse/{username}/request-cv', 'EmployerController@cvRequest');
}); ->displays view for an employer to request seekers CV</li>

<br><b>Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){</b><br>
	<li>Route::get('/', 'AdminController@panel')->name('adminpanel') ->displays admin panel view</li>
    <li>Route::get('panel', 'AdminController@panel');  ->displays admin panel </li>
    <li>Route::get('posts', 'AdminController@posts'); ->displays job posts view</li>
    <li>Route::get('posts/{slug}', 'AdminController@viewPost'); ->displays a particular job post</li>
    <li>Route::post('posts/{slug}/update', 'AdminController@updatePost'); ->update a job post in the database</li>
    <li>Route::get('blog','AdminController@blog'); ->displays blog view</li>
    <li>Route::resource('bloggers','BloggersController');<br>
    @index Show the main view<br>
    @create Show the view to create a blogger<br>
    @store Save a blogger  <br>
    @edit Show a blogger view<br>
    @update Update blogger in database<br>
    @destroy Delete a blogger in database<br>
    </li>
    <li>Route::get('seekers/{username?}','AdminController@seekers'); ->displays view for a seeker with a certain username</li>
    <li>Route::get('cv-requests/{id?}','AdminController@cvRequests'); ->displays cv request view</li>

    <li>Route::get('vacancy-emails', 'AdminController@vacancyEmails'); ->shows the view to compose vacancy emails </li>
    <li>Route::get('emails', 'AdminController@emails'); ->displays emails view</li>
    <li>Route::post('emails/send', 'AdminController@sendEmails'); ->send vacancy emails</li>
    <Li>Route::get('contacts', 'AdminController@contacts'); ->displays contacts for admins</Li>
    <li>Route::post('saveResolution', 'AdminController@saveResolution'); ->sends contact message to the database</li>
    <li>Route::get('metrics', 'AdminController@seekerMetrics'); -.displays metrics view</li>
    <li>Route::resource('cveditors','EditorController');<br>
    @index Show the main view<br>
    @create Show the view to create a cveditor<br>
    @store Save a cv editor  <br>
    @edit Show a cv editor view<br>
    @update Update cv editor in database<br>
    @destroy Delete a cv editor in database<br>
</li>
    <li>Route::get('cv-edit-requests/{id?}', 'AdminController@editingRequests'); ->displays view to make a cv editing request</li>
    <li>Route::post('cv-edit-requests/{id}/assign', 'AdminController@assignEditingRequests'); ->sends a cv editing assignment</li>
    <li>Route::resource('industries', 'IndustryController');<br>
    @create Show the view to create a industry<br>
    @store Save an industry  <br>
    @edit Show an industry view<br>
    @update Update an industry in database<br>
    @destroy Delete an industry in database<br>
    </li>
    <li>Route::get('employers', 'AdminController@employers'); ->displays view for employers</li>
    <li>Route::get('companies', 'AdminController@companies'); ->displays view for comapanies</li>
    <li>Route::post('log-in-as', 'AdminController@loginas'); ->sends the login type</li>
    <li>Route::get('username/{username}', 'AdminController@loginWithUsername');</li>

    <li>Route::resource('job-post-groups', 'PostGroupController');<br>
    @create Show the view to create job post group<br>
    @store Save job post group <br>
    @edit Show job post group<br>
    @update Update job post group in database<br>
    @destroy Delete job post group in database<br></li>
    <li>Route::resource('countries', 'CountryController');<br>
    @create Show the view to create a country<br>
    @store Save a country <br>
    @edit Show a country view<br>
    @update Update a country in database<br>
    @destroy Delete a country in database<br>
    </li>
    <li>Route::resource('locations', 'LocationController');<br>
    @create Show the view to create location<br>
    @store Save location <br>
    @edit Show location view<br>
    @update Update location in database<br>
    @destroy Delete location in database<br>
    </li>
    <li>Route::resource('faqs', 'FaqController');<br>
    @create Show the view to create frequently asked questions<br>
    @store Save frequently asked questions<br>
    @edit Show frequently asked question<br>
    @update Update frequently asked questions in database<br>
    @destroy Delete frequently asked question in database<br>
    </li>

    <li>Route::resource('unregistered-users', 'UnregisteredUsersController');<br>
    @create Show the view to create unregistered users<br>
    @store Save unregistered users <br>
    @edit Show unregistered user view<br>
    @update Update unregistered user in database<br>
    @destroy Delete unregistered user in database<br>
    </li>
    <li>Route::post('unregistered-users/import', 'UnregisteredUsersController@import');</li>

    <li>Route::get('received-requests/{id?}', 'AdvertController@index'); ->displays advert request view</li>
    <li>Route::post('received-requests/{id}', 'AdvertController@saveNotes'); ->saves the advert request</li>

    <li>Route::post('toggle-seeker-featured', 'AdminController@toggleSeekerFeatured');</li>

    <li>Route::resource('products','ProductController');<br>
    @create Show the view to create product<br>
    @store Save product<br>
    @edit Show product view<br>
    @update Update product in database<br>
    @destroy Delete product in database<br>
    </li>
    <li>Route::resource('invoices','InvoiceController');');<br>
    @create Show the view to create invoice<br>
    @store Save invoice<br>
    @edit Show invoice view<br>
    @update Update invoice in database<br>
    @destroy Delete invoice in database<br>
    </li>
    <li>Route::post('invoices/{slug}/remindViaEmail', 'InvoiceController@remindViaEmail'); ->sends invoice reminder through email</li>
    <li>Route::get('invoices/{slug}/remindViaEmail', 'InvoiceController@show'); ->displays invoice preview
});</li>



<br><b>Route::group(['prefix' => 'job-seekers',  'middleware' => 'seeker'], function(){</b><br>
    <li>Route::get('/', 'SeekerController@toProfile'); ->displays seeker's profile</li>
    <li>Route::get('dashboard', 'SeekerController@dashboard'); ->display seeker's dashboard</li>
    <li>Route::get('feed', 'SeekerController@feed'); 
});</li>

<li>Route::get('/job-seekers/cv-editing', 'ContactController@cvediting'); ->displays cv-editing view</li>
<li>Route::get('/job-seekers/cv-templates', 'ContactController@cvtemplates')->middleware('auth'); ->displays cv templates view</li>
<li>Route::get('/job-seekers/premium-placement', 'ContactController@pplacement'); ->displays premium placement view</li>
<li>Route::get('/job-seekers/services', 'ContactController@jservices'); ->displays services view for job seekers</li>
<li>Route::get('/job-seekers/faqs', 'ContactController@jobSeekerFaqs'); ->displays frequently asked questions for job seekers</li>


<li>Route::get('/employers/services', 'ContactController@eservices'); ->displays services for employers</li>
<li>Route::get('/employers/background-checks', 'ContactController@bkgtests'); ->displays background checks view</li>
<li>Route::get('/employers/iq-tests', 'ContactController@iqtests'); ->displays IQ tests view</li>
<Li>Route::get('/employers/proficiency-tests', 'ContactController@proficiency'); ->displays employer tests view</Li>
<li>Route::get('/employers/psychometric-tests', 'ContactController@psychometric'); ->displays psychometric tests view</li>
<li>Route::get('/employers/train-employees', 'ContactController@retrain'); ->displays train view</li>
<li>Route::get('/employers/faqs', 'ContactController@employerFaqs'); ->displays frequently asked questions view</li>


<li>Route::resource('/vacancies', 'PostsController');<br>
    @create Show the view to create vacancies<br>
    @store Save vacancies<br>
    @edit Show vacancy view<br>
    @update Update vacancy in database<br>
    @destroy Delete vacancy in database<br>
    </li>
</li>
<li>Route::get('/employers/publish', 'ContactController@epublish'); ->displays view to create a job advert</li>
<li>Route::post('/employers/publish', 'AdvertController@store'); ->sends job advert to database</li>
<li>Route::get('/vacancies/{slug}/apply','PostsController@apply')->middleware('seeker'); ->displays view for seeker to apply for a vacancy</li>
<li>Route::post('/vacancies/{slug}/apply','JobApplicationController@accept')->middleware('seeker'); ->send seeker's vacancy application</li>
<li>Route::get('/profile/applications/{id?}','SeekerController@applications')->middleware('seeker'); ->displays seeker's applications view</li>
<li>Route::get('/profile/referees/{id?}','RefereeController@view')->middleware('seeker'); ->displays seeker's profile</li>
<li>Route::post('/apply-easy/{slug}','ContactController@easyApply')->middleware('guest'); ->send the application of unregistered seeker easily</li>

<li>Route::get('/vacancies/{slug}/deactivate','PostsController@deactivate')->middleware('employer'); ->closes a vacancy</li>
<li>Route::get('/vacancies/{slug}/activate','PostsController@activate')->middleware('employer'); ->activates a vacancy </li>

<br><b>Route::group(['prefix' => 'desk',  'middleware' => 'super'], function(){</b><br>
    <li>Route::get('admins', 'SuperAdminController@admins'); ->shows super admin view</li>
    <li>Route::get('create-admin', 'SuperAdminController@create'); ->shows view to create an admin</li>
    <li>Route::post('create-admin', 'SuperAdminController@saveAdmin'); ->saves admin to database</li>
    <li>Route::get('enable-admin', 'SuperAdminController@enable'); ->enables an admin</li>
    <li>Route::get('disable-admin', 'SuperAdminController@disable'); ->disables an admin</li>
    <li>Route::get('documentation/{endpoint?}',  'SuperAdminController@document'); ->shows the documentation of the system
});</li>

<li>Route::get('auth-with/{provider}', 'SocialiteController@redirectToProvider'); ->redirect user to social authentication</li>
<li>Route::get('auth-with/{provider}/callback', 'SocialiteController@handleProviderCallback'); ->obtain user information</li>

<li>Route::get('/unsubscribe/{email}', 'EmailController@unsubscribe')->name('unsubscribe'); ->opt out to email alert</li>
<li>Route::get('/subscribe/{email}', 'EmailController@subscribe')->name('subscribe'); ->opt in to email alerts</li>


<li>Route::get('/sitemap.xml', 'SitemapController@index');</li>
<li>Route::get('/sitemap/posts.xml', 'SitemapController@posts');</li>
<li>Route::get('/sitemap/blogs.xml', 'SitemapController@blogs');</li>
</ul>

</p>


    </div>
</div>

@endsection