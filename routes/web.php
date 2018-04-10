<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Posts\PostsController@index')->name('home');

Route::group(['namespace' => 'Posts', 'prefix' => 'post'], function () {
    Route::get('', 'PostsController@index');
    Route::get('create', 'PostsController@create');
    Route::post('', 'PostsController@store');
    Route::get('{post}', 'PostsController@show');
    Route::get('{post}/edit', 'PostsController@edit');
    Route::put('{post}/update', 'PostsController@update');
    Route::delete('{post}/delete', 'PostsController@destroy');

    // Comments
    Route::post('{post}/comments', 'CommentsController@store');
    Route::delete('{post}/{comment}', 'CommentsController@destroy');
});


Route::group(['namespace' => 'Posts', 'prefix' => 'category'], function () {
    Route::get('create', 'CategoriesController@create');
    Route::post('', 'CategoriesController@store');
    Route::delete('{category}/delete', 'CategoriesController@destroy');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::get('register', 'RegistersController@create')->name('register');
    Route::post('register', 'RegistersController@store');
    Route::get('login', 'LoginsController@create')->name('login');
    Route::post('login', 'LoginsController@store');
    Route::get('logout', 'LoginsController@logout')->name('logout');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('', 'AdministrationController@index')->name('admin');
});


//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
