<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/admin', function()
{
	return Redirect::to('admin/login');
});

Route::any('admin/login', 'Admin_UsersController@login');

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
	Route::any('logout', 'Admin_UsersController@logout');
	
	Route::resource('users', 'Admin_UsersController');
	Route::resource('homes', 'Admin_HomesController');
	Route::resource('works', 'Admin_WorksController');
	Route::any('work_pictures/create/{work_id}', 'Admin_Work_picturesController@create');
	Route::resource('work_pictures', 'Admin_Work_picturesController');	
	Route::resource('work_types', 'Admin_Work_typesController');
	Route::resource('abouts', 'Admin_AboutsController');
	Route::resource('services', 'Admin_ServicesController');
	Route::resource('posts', 'Admin_PostsController');

	Route::get('/', function(){
		return Redirect::to('admin/homes/');
	});

	Route::any('{all}', function($uri){
        return Redirect::to('admin/homes/')
            ->with('flash_error', "The administration page 'admin/$uri' could not be found.");
    })->where('all', '.*');

});