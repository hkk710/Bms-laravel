<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('membership/{id}/delete', ['uses' => 'membershipController@delete', 'as' => 'membership.delete']);
Route::resource('/membership', 'membershipController');
Route::get('/exist/membership', 'membershipController@exist');