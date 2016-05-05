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
    return view('home');
});

Route::group(["prefix"=>"api"], function(){
	Route::post('/signup', 'UserController@create');
	Route::post('/get/keys', 'UserController@getAuthKeys');
	Route::get('/users', 'UserController@get');
	Route::post('/ride/give', 'JournerController@create');
	Route::post('/ride/take', 'JoinerController@create');
});
