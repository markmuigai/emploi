<?php

Route::group(['prefix' => 'employers',  'middleware' => 'employer'], function(){
    Route::get('dashboard', 'EmployerController@dashboard');
    Route::get('dashboard/applications', 'EmployerController@internalApp');
    Route::get('dashboard-data', 'EmployerController@dashboardData');
    Route::get('dashboard-stats', 'EmployerController@dashboardStats');
    Route::get('dashboard-chartData', 'EmployerController@dashboardChartData');
    Route::get('jobs', 'EmployerController@jobs');
    Route::get('dashboard/top-candidates', 'EmployerController@topCandidates');
    Route::get('jobs/active', 'EmployerController@activeJobs');
    Route::get('jobs/other', 'EmployerController@otherJobs');
    Route::get('jobs/shortlisting', 'EmployerController@shortlistingJobs');
    Route::get('referee/{slug}','EmployerController@viewReport');

});

Route::get('/post-a-job', 'PostAJobController@postJob');
Route::get('/employers/publish', 'PostAJobController@advertise');
//Route::get('/employers/advertise/{industry_name?}', 'ContactController@advertise');
Route::post('/employers/publish', 'AdvertController@store');

Route::get('/employers/register', 'EmployerController@register');
Route::post('/employers/registered', 'EmployerController@create');
Route::get('/employers/registered', 'EmployerController@register');


Route::get('/employers/rate-card', 'ContactController@rateCard');

Route::get('/employers/premium-recruitment', 'ContactController@precruit');
Route::get('/employers/candidate-vetting', 'ContactController@cvetting');
Route::get('/employers/hr-services', 'ContactController@hrservices');
Route::get('/employers', 'ContactController@employersIndex');
Route::get('/employers/advertise', 'ContactController@oldAdvertise');

Route::group([ 'middleware' => 'shortlist'], function(){
    Route::resource('/employers/cv-requests', 'CvRequestController');
    Route::resource('/employers/saved', 'SavedProfileController');
    Route::get('/employers/paas-dash', 'EmployerController@paasdash');
    Route::get('/employers/paas-tasks', 'EmployerController@paastask');
    Route::get('/employers/view-invoice/{slug}', 'EmployerController@viewInvoice');
    Route::get('/employers/paas-hire/{id}', 'EmployerController@hire');

    Route::get('/employers/accept-leave/{id}', 'EmployerController@acceptLeave');
    Route::get('/employers/reject-leave/{id}', 'EmployerController@rejectLeave');

    Route::get('/employers/edit-task/{slug}', 'TaskController@editTask');
    Route::post('/employers/edit-task/{slug}', 'TaskController@update');
    Route::get('/employers/delete-task/{slug}', 'TaskController@delete');
    Route::get('/employers/shortlist/{slug}', 'TaskController@shortlist');


    Route::get('/employers/requests', 'EmployerController@prequest');
    Route::get('/employers/admin-paas', 'EmployerController@adminpaas');
    Route::get('/employers/invoice-paas', 'EmployerController@paasinv');

    Route::get('signaturepad','SignaturePadController@index');
    Route::post('signaturepad','SignaturePadController@upload')->name('signaturepad.upload');

    Route::get('/employers/browse', 'EmployerController@browse');
    Route::get('/employers/browse/{username}', 'EmployerController@viewSeeker');
    Route::post('/employers/shortlist', 'EmployerController@applyForUser');

    Route::get('/employers/applications/{slug}/rsi', 'EmployerController@rsi');
    Route::post('/employers/applications/{slug}/rsi', 'EmployerController@saveRsi');
    Route::get('/employers/applications/{slug}/', 'EmployerController@applications');

    //Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@toggleShortlist');
    Route::get('/employers/shortlist-toggle/{slug}/{username}', 'EmployerController@shortlistSeekerToggle');
    //Route::get('/employers/reject-toggle/{slug}/{username}', 'EmployerController@toggleReject');
    Route::get('/employers/reject-toggle-id/{slug}/{user_id}', 'EmployerController@toggleRejectById');
    Route::get('/employers/applications/{slug}/close', 'EmployerController@closeJob');
    Route::post('/employers/applications/{slug}/close', 'EmployerController@saveCandidate');
    Route::get('/employers/applications/{slug}/invite', 'EmployerController@invite');
    Route::post('/employers/applications/{slug}/interview', 'EmployerController@interviewCandidate');
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
