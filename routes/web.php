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



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post/index', [
        'uses' => 'PostsController@index',
        'as' => 'post.index'
    ]);

    Route::get('/post/trash', [
        'uses' => 'PostsController@trashed',
        'as' => 'post.trash'
    ]);

    Route::get('/post/kill/{id}', [
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('/post/restore/{id}', [
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/create', [
        'uses' => 'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses' => 'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/post/edit/{id}', [
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);



    // Categories part

    Route::get('/categories', [
        'uses' => 'CategoryController@index',
        'as' => 'categories'
    ]);

    Route::get('/category/create', [
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoryController@destroy',
        'as' => 'category.delete'
    ]);


    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('/tag/index', [
        'uses' => 'TagsController@index',
        'as' => 'tag.index'
    ]);
    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/users/create', [
        'uses' => 'UsersController@create',
        'as' => 'users.create'
    ]);

    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);
    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [
            'uses' => 'UsersController@not_admin',
            'as' => 'user.not.admin'
    ]);

    Route::get('/user/profile', [
        'uses' => 'ProfileController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/user/profile/update', [
        'uses' => 'ProfileController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    /*Route::get('test/', function (){
        return App\Post::find(1)->Category;
    });*/

});


