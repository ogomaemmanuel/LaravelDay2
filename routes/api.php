<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('postblog', '\App\Http\Controllers\Api\BlogController@store');

Route::get('bloglist', '\App\Http\Controllers\Api\BlogController@index');

Route::get('blog/{id}', '\App\Http\Controllers\Api\BlogController@show');