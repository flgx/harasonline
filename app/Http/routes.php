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

	//Imagenes
	Route::resource('imagen', 'ImageController');

	//Caballo
	Route::resource('caballo', 'HorseController');
	Route::get('caballo/{id}/destroy',[
		'uses' => 'HorseController@destroy',
		'as'   => 'admin.caballo.destroy',
		
	]);
	Route::resource('user', 'UserController');
});
Route::auth();
