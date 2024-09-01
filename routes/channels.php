<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;

Broadcast::channel('App.Models.User.{id}', function($user, $id){
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('chat.online.{chatRoomId}', function($user, $chatRoomId){
    return [
        'id'    =>  $user->id, 
        'first_name'    =>  $user->first_name, 
        'last_name'     =>  $user->last_name
    ];
});
