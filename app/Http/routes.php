<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/training', function () {
    return view('training');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/admin/students', function () {
    return view('students');
});

Route::get('/downloads', function () {
    return view('downloads');
});

Route::get('/staff', function () {
    return view('staff');
});

Route::get('/roster', function () {
    return view('roster');
});

Route::get('/sops', function () {
    return view('sops');
});

Route::get('/positions', function () {
    return view('positions');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/admin/cbtv', function () {
    return view('cbtv');
});

Route::get('/visit', function () {
    return view('visit');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/about', function () {
    return view('about');
});

// Visiting Application
Route::post('/visitapp', 'VisitController@store');

// Pilot Feedback
Route::post('/pfeed', 'FeedbackController@store');

/* Profiles
Route::get('/roster/{cid}', function ($cid) {
    return view('profile');
}); */

//Password Resets
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::get('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');


/* Email */
Route::post('admin/training_systems', 'Training_SystemsController@postNotify');

/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
