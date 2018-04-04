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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'posts', 'middleware' => 'role:owner|admin'], function () {

    Route::get('/', 'PostsController@list')->name('posts.index');
    Route::get('/add', 'PostsController@add')->name('posts.add');
    Route::get('/details/{id}', 'PostsController@details')->name('posts.details');
    Route::get('/edit/{id}', 'PostsController@edit')->name('posts.edit');
    Route::post('/insert', 'PostsController@insert')->name('posts.insert');
    Route::post('/update/{id}', 'PostsController@update')->name('posts.update');
    Route::get('/delete/{id}', 'PostsController@delete')->name('posts.delete');

});

Route::group(['prefix' => 'users', 'middleware' => 'role:admin|owner'], function () {
    Route::get('/', 'UsersController@list')->name('users.index');
    Route::get('/add', 'UsersController@add')->name('users.add');
    Route::get('/details/{id}', 'UsersController@details')->name('users.details');
    Route::get('/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('/insert', 'UsersController@insert')->name('users.insert');
    Route::post('/update/{id}', 'UsersController@update')->name('users.update');
    Route::get('/delete/{id}', 'UsersController@delete')->name('users.delete');
});
