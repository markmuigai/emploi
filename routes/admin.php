
<?php

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function(){
    Route::resource('industry-skills', 'IndustrySkillsController');
    Route::get('/', 'AdminController@panel')->name('adminpanel');
    Route::get('panel', 'AdminController@panel');
    Route::get('posts', 'AdminController@posts');
    Route::get('posts/{slug}', 'AdminController@viewPost');
    Route::post('posts/{slug}/update', 'AdminController@updatePost');
    Route::get('blog','AdminController@blog');
    Route::resource('bloggers','BloggersController');
    Route::get('referees','AdminController@referees');
    Route::get('seekers/{username?}','AdminController@seekers');
    Route::get('paas-seekers/{username?}','AdminController@PaasSeekers');
    Route::get('referee/{slug}','AdminController@viewReport');
    Route::get('cv-requests/{id?}','AdminController@cvRequests');
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
    Route::get('paas-employers','AdminController@PaasEmployers');
    Route::get('companies', 'AdminController@companies');
    Route::post('log-in-as', 'AdminController@loginas');
    Route::get('username/{username}', 'AdminController@loginWithUsername');  

    Route::get('paas-task/{id?}', 'AdminController@taskRequests');
    Route::get('paas-send/{id}', 'AdminController@sendTasks');


    Route::get('referrals', 'AdminController@referrals');
    Route::get('cv-referrals', 'AdminController@cvReferrals');
    Route::get('invite-links', 'AdminController@inviteLinks');

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

    Route::get('events/{endpoint?}','MeetupController@adminMeetups');
    Route::get('eplacement','AdminController@eplacement');
    Route::get('coaching','AdminController@coaching');
    Route::get('eplacement/{id}','AdminController@makeFeatured');

    Route::get('paas-applications','AdminController@paasApplications');
    Route::get('paas-applications/{id}','AdminController@paasApplication');
    Route::get('shortlist-toggle/{slug}/{username}', 'AdminController@shortlistSeekerToggle');

    Route::get('cv-builder', 'AdminController@CvBuilder');

    Route::resource('assessments','AssessmentController');

    Route::resource('assessmentResults','AssessmentResultController');

    Route::resource('cvTests', 'cvTestController');

    Route::post('cvTests/deleteAll', 'cvTestController@deleteAll')->name('cvTests.deleteAll');

    // Download pdf
    Route::post('referee-form/download/{slug}', 'RefereeReportController@download')->name('refereeForm.download');

    // View sample pdf layout
    Route::get('referee-form/view', 'RefereeReportController@show')->name('refereeForm.show');

    // Search for referee
    Route::post('referee/search', 'RefereeController@search')->name('referee.search');

});