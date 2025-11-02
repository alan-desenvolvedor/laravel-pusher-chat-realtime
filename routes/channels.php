<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

// FUNÇÃO CHAT CANAL PUBLICO
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// FUNÇÃO DO CHAT CANAL PRIVADO
// Broadcast::channel('chat.{id}', function (User $user, int $id) {
//     return $user->id ===  $id;
// });