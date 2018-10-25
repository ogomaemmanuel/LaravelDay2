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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('comments/{id?}', ['uses' => 'CommentsController@store', 'as' => "comments.store"]);
Route::get('blog/search/{search?}', ['uses' => 'BlogController@search', 'as' => "blog.search"]);

Route::resource('blog', 'BlogController');
