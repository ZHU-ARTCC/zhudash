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

Route::get('/admin/cbtv', function () {
    return view('cbtv');
});


/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
