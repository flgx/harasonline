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
	Route::get('/',[
		'uses' => 'HorseController@getAllHorses',
		'as' => 'front.index',
	]);
	Route::get('/caballo/{name}',[
		'uses' => 'HorseController@show',
		'as' => 'horse.show',
	]);
});
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
	//Index
	Route::get('/', function () {
	    return view('back.welcome');
	});
	//Categorias
	Route::resource('categorias', 'CategoryController');
	Route::delete('/categorias/destroyCategory/{id}',[
		'uses' => 'CategoryController@destroyCategory',
		'as' => 'admin.categoria.destroyCategory',
	]);
	//Imagenes
	Route::resource('imagen', 'ImageController');
	Route::delete('/imagen/destroyImage/{id}',[
		'uses' => 'ImageController@destroyImage',
		'as' => 'admin.image.destroyImage',
	]);
	//Caballo
	Route::resource('caballos', 'HorseController');
	Route::delete('/caballos/destroyHorse/{id}',[
		'uses' => 'HorseController@destroyHorse',
		'as' => 'admin.image.destroyHorse',
	]);
	//Usuario
	Route::resource('user', 'UserController');
});
Route::auth();
