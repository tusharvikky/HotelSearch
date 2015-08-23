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
	$data['roomTypes'] = App\RoomType::all();

    return view('welcome', $data);
});

Route::group(array('prefix' => 'api/v1'), function()
{
	Route::get('rooms/searchAvailability', ['as' => 'rooms.searchAvailability', 'uses' => 'RoomtypeController@searchAvailability']);
});