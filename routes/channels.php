<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('channels.{channel}', function ($user, $channel) {
    return true;
});

Broadcast::channel('users.{user_id1}_{user_id2}', function ($user, $user_id1, $user_id2) {
    return (int) $user->id === (int) $user_id1 || (int) $user->id === (int) $user_id2;
});