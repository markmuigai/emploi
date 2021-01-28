<?php

// Landing page
Route::get('/', 'WelcomeController@index')->name('index');

// Register as employer vs jobseeker page
Route::get('/join', 'ContactController@join');

// media page
Route::get('/media', 'MediaController@index')->name('index');

// news letter
Route::resource('/news-letter', 'NewsLetterController');

//employer landing page
Route::get('/employers/advertise-here', 'EmployerController@home');