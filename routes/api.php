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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('users/register', 'Api\AuthController@register');
Route::post('users/login', 'Api\AuthController@login');

Route::group(['middleware' => 'jwt.auth'], function(){
    Route::get('users/logout', 'Api\AuthController@logout');
    Route::get('posts', 'Api\PostsController@index');
    Route::get('users', 'Api\AuthController@index');
});