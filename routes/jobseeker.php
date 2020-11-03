<?php
/**
 * Job seeker routes
 */
// Vacancies
Route::resource('/vacancies', 'PostsController');

// Self assessments
Route::resource('/self-assessments', 'SelfAssessmentController');

// Job seeker routes
Route::group(['prefix' => 'job-seekers',  'middleware' => 'seeker'], function(){
    Route::get('/', 'SeekerController@toProfile');
    Route::get('dashboard', 'SeekerController@dashboard');
    Route::get('feed', 'SeekerController@feed');
    Route::get('/profile/applications/{id?}','SeekerController@applications');
    Route::get('/profile/referees/{id?}','RefereeController@view');

    Route::get('/personal-details/edit','HomeController@editBio');
    Route::post('/personal-details/update','HomeController@updateBio');
    Route::get('/education/edit','HomeController@editEdu');
    Route::post('/education/update','HomeController@updateEdu');

    Route::get('/experience/edit','HomeController@editExp');
    Route::post('/experience/update','HomeController@updateExp');
    Route::get('/skills/edit','HomeController@editSkills');
    Route::post('/skills/update','HomeController@updateSkills');

});

Route::get('/home', 'HomeController@index')->name('home');

// CV Review routes
Route::resource('cv-review', 'CVReviewController');

// Self Assessment routes
Route::resource('self-assessment', 'SelfAssessmentController');

// Filter assessment questions based on paramenters
Route::post('self-assessment/filter', 'SelfAssessmentController@filterAssessments')->name('self-assessment.filter') ;

// Recommended Jobs
Route::resource('recommendation', 'RecommendationController');
