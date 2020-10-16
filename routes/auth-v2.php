<?php

// v2 auth pages
Auth::routes();


Route::get('/registered', 'ContactController@registered');
Route::get('/logout', 'Auth\LoginController@logout');