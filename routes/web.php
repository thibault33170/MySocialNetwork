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

Route::group(['middleware' => 'auth'], function () {
    /**
     * Home route
     */
    Route::get('/home', 'HomeController@index');

    /**
     * Profile routes
     */
    Route::get('/profile/{username}', 'ProfileController@profile');
    Route::post('profile', 'ProfileController@updateAvatar');
    Route::post('/search', 'ProfileController@searchProfile');

    /**
     * Like routes
     */
    Route::get('/like/isLiked/{article_id}','LikeController@isLiked');
    Route::get('/like/number/{article_id}','LikeController@number');
    Route::post('/like/likePost','LikeController@likePost');
    Route::post('/like/unlikePost','LikeController@unlikePost');

    /**
     * Article routes
     */
    Route::resource('articles','ArticlesController');

    /**
     * Comments routes
     */
    Route::resource('comments','CommentsController');

    /**
     * Follow routes
     */
    Route::post('/user/follow', 'FollowsController@follow');
    Route::post('/user/unfollow', 'FollowsController@unfollow');
    Route::post('/user/isFollowed', 'FollowsController@isfollowed');
});