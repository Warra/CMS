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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Article Routes
Route::get('/articles/{id}', 'ArticleController@show');

Route::get('/articles', 'ArticleController@view');
Route::post('/articles/{id}/', 'ArticleController@updateShow');
Route::post('/articles/{id}/update', 'ArticleController@update');
Route::post('/articles/{id}/delete', 'ArticleController@delete');

//Tag Routes
Route::get('/tags', 'TagController@view');
Route::post('/tags{id}/', 'TagController@updateShow');
Route::post('/tags{id}/update', 'TagController@update');
Route::post('/tags{id}/delete', 'TagController@delete');