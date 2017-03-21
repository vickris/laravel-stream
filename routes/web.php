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

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('posts', 'PostsController');
    Route::get('/users', 'FollowController@index');
    Route::post('/follow', 'FollowController@follow');
    Route::delete('/follow/{follow}', 'FollowController@unfollow');
    Route::get('/feed', 'FeedsController@newsFeed');
    Route::get('/notifications', 'FeedsController@notification');
});



