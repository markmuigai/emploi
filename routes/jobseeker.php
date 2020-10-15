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
});

Route::get('/home', 'HomeController@index')->name('home');