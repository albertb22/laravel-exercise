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
});
