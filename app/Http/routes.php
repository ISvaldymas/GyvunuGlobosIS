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
Route::get('/email/confirm/{token?}', 'Auth\EmailConfirmController@confirmEmail');
Route::group(['middleware' => 'auth'], function () {
	//Only authenticated users may enter:
	Route::get('/home', 'PagesController@home');
	Route::get('/registration', 'UserInformationController@registration');
	Route::post('/registration/store', 'UserInformationController@store');
	Route::get('/email/resend_confirm', 'Auth\EmailConfirmController@resendConfirmEmail');
	Route::resource('staff', 'StaffController');
	//-------------------------------------------------------------------
    Route::get('profile/{client}/edit', [
        'uses' => 'UserInformationController@edit',
        'as' => 'profile.edit'
    ]);
	Route::match(array('PUT', 'PATCH'), "profile/{client}", array(
	      'uses' => 'UserInformationController@update',
	      'as' => 'profile.update'
	));
    //-------------------------------------------------------------------
    Route::resource('email','EmailController');
	Route::get('contact', 'EmailController@getContact');
	Route::post('contact', 'EmailController@postContact');
	Route::post('email/store', 'EmailController@store');
	Route::resource('report', 'ReportController@index');

	Route::resource('ereport', 'ReportsController@index');
	Route::resource('entertainments','EntertainmentController');
	Route::resource('decorations','DecorationController');
	//-------------------
		//--------------------
	Route::resource('rooms','RoomController');
	Route::resource('amenities','AmenitiesController');

	Route::post('rooms/{room_id}', [
	'uses' => 'RateController@store',
	'as' => 'rate.store']);
});

