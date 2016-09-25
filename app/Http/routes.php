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

Route::group(['middleware' => 'guest'], function () {
	//Only guests users may enter:
	Route::get('/', 'PagesController@getIndex');
});

Route::auth();
Route::group(['middleware' => 'auth'], function () {
	//Only authenticated users may enter:
	Route::get('/home', 'PagesController@home');
});
