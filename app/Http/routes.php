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
Route::group(['middleware' => 'web'],function(){
	Route::get('/', function () {
	    return view('front.index');
	});
	Route::get('/caballo/{name}',[
	'uses' => 'HorseController@show',
	'as' => 'horse.show',
]);
});
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
	Route::get('/', function () {
	    return view('back.welcome');
	});
	Route::resource('imagen', 'ImageController');
	Route::resource('caballo', 'HorseController');
	Route::resource('categoria', 'CategoryController');
	Route::resource('user', 'UserController');
});
Route::auth();
