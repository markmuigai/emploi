<?php
/**
 * Job seeker routes
 */
// Vacancies
Route::resource('/vacancies', 'PostsController');

// Self assessments
Route::resource('/self-assessments', 'SelfAssessmentController');
