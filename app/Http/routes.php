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



Route::group(['middleware' => ['auth']], function() {
    Route::get('test', function () {
        return view('welcome');
    });
    
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('home', function () {
        return view('welcome');
    });
    
    Route::get('users', 'UserController@index');
    Route::post('users', 'UserController@post_index');
    Route::get('users/delete/{id}', 'UserController@delete');
    
    Route::post('editable', 'UserController@editable');
    
    
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
