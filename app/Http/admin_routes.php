<?php

/* ================== Homepage ================== */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
    
    /* ================== User Updaters ================== */
	Route::post(config('laraadmin.adminRoute') . '/user_update', 'Role_userController@store');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');
    
	/* ================== Events ================== */
	Route::resource(config('laraadmin.adminRoute') . '/events', 'LA\EventsController');
	Route::get(config('laraadmin.adminRoute') . '/event_dt_ajax', 'LA\EventsController@dtajax');

	/* ================== Event_Requests ================== */
	Route::resource(config('laraadmin.adminRoute') . '/event_requests', 'LA\Event_RequestsController');
	Route::get(config('laraadmin.adminRoute') . '/event_request_dt_ajax', 'LA\Event_RequestsController@dtajax');
    Route::post(config('laraadmin.adminRoute') . '/event_request_email', 'LA\Event_RequestsController@store');

	/* ================== Training_Systems ================== */
	Route::resource(config('laraadmin.adminRoute') . '/training_systems', 'LA\Training_SystemsController');
	Route::get(config('laraadmin.adminRoute') . '/training_system_dt_ajax', 'LA\Training_SystemsController@dtajax');
    Route::post(config('laraadmin.adminRoute') . '/training_system_pick', 'LA\Training_SystemsController@pick');
    Route::post(config('laraadmin.adminRoute') . '/training_system_post_notify', 'LA\Training_SystemsController@postNotify');
    Route::get(config('laraadmin.adminRoute') . '/training_system_final', 'LA\Training_SystemsController@finalize');

	/* ================== Downloads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/downloads', 'LA\DownloadsController');
	Route::get(config('laraadmin.adminRoute') . '/download_dt_ajax', 'LA\DownloadsController@dtajax');
    
	/* ================== News ================== */
	Route::resource(config('laraadmin.adminRoute') . '/news', 'LA\NewsController');
	Route::get(config('laraadmin.adminRoute') . '/news_dt_ajax', 'LA\NewsController@dtajax');

	/* ================== CBTs ================== */
	Route::resource(config('laraadmin.adminRoute') . '/cbts', 'LA\CBTsController');
	Route::get(config('laraadmin.adminRoute') . '/cbt_dt_ajax', 'LA\CBTsController@dtajax');

	/* ================== Updaters ================== */
	Route::resource(config('laraadmin.adminRoute') . '/updaters', 'LA\UpdatersController');
	Route::get(config('laraadmin.adminRoute') . '/updater_dt_ajax', 'LA\UpdatersController@dtajax');

	/* ================== Sops ================== */
	Route::resource(config('laraadmin.adminRoute') . '/sops', 'LA\SopsController');
	Route::get(config('laraadmin.adminRoute') . '/sop_dt_ajax', 'LA\SopsController@dtajax');

	/* ================== Positions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/positions', 'LA\PositionsController');
	Route::get(config('laraadmin.adminRoute') . '/position_dt_ajax', 'LA\PositionsController@dtajax');

});
