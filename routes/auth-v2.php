<?php

// v2 auth pages
Auth::routes();


Route::get('/registered', 'ContactController@registered');
Route::get('/logout', 'v2\Auth\LoginController@logout');