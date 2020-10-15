<?php

// Landing page
Route::get('/', 'WelcomeController@index')->name('index');

// Register as employer vs jobseeker page
Route::get('/join', 'ContactController@join');