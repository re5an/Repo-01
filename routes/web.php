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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/post', 'PostController@store')->name('post.store');
Route::post('/{id}/comment', 'PostController@storeComment')->name('saveComment');
Route::get('/post', 'PostController@index')->name('showPostsPaginated');
Route::get('/post/{post}', 'PostController@show')->name('showPost');

Route::get('/{id}/posts', 'PostController@userPosts')->name('userPosts')->middleware('auth');
Route::get('/posts/edit/{post}', 'PostController@edit')->name('post.edit')->middleware('auth');
Route::put('/posts/edit/{post}', 'PostController@update')->name('post.edit')->middleware('auth');
Route::delete('/posts/{post}', 'PostController@destroy')->name('post.delete')->middleware('auth');
