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

// CV Improvement Area routes
Route::resource('cv-improvement', 'CVImprovementAreaController');

// Self Assessment routes
Route::resource('self-assessment', 'SelfAssessmentController');
Route::get('assessment/about', 'SelfAssessmentController@about');

// Filter assessment questions based on paramenters
Route::post('self-assessment/filter', 'SelfAssessmentController@filterAssessments')->name('self-assessment.filter') ;

// personality assessment for practice
Route::post('self-assessment/personality-practice', 'SelfAssessmentController@getPersonalityPracticeTest')->name('personality.practice') ;

// Recommended Jobs
Route::resource('recommendation', 'RecommendationController');

// Favourite a job
Route::resource('favourite', 'FavouriteController');

// Job seeker faqs
Route::get('/job-seekers/faqs', 'FAQController@index')->name('jobseeker.index');

// Professional CV Editing
Route::resource('/job-seekers/cv-editing', 'CVEditingController');

// About us page
Route::get('about', 'AboutController@index');

//resend referee assessment link
Route::get('/referees/{id}/resend', 'RefereeController@resendLink');

//register route
Route::get('/register/create', 'RegisterController@create');
Route::post('/register/store', 'RegisterController@store');