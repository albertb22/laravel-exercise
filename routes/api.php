<?php

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

Route::middleware('auth:api')->group(function () {
    Route::get('channels', 'ChannelController@index')
        ->name('channels.index');
    Route::get('channels/{channel}/messages', 'ChannelController@getMessages')
        ->name('channels.messages.index');
    Route::post('channels/{channel}/messages', 'MessageController@sendToChannel')
        ->name('channels.messages.store');

    Route::get('users', 'UserController@index')
         ->name('users.index');
    Route::get('users/auth', 'UserController@getAuthUser')
         ->name('users.auth');
    Route::get('users/{user}/messages', 'UserController@getMessages')
         ->name('users.messages.index');
    Route::post('users/{user}/messages', 'MessageController@sendToUser')
         ->name('users.messages.store');
});
