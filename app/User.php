<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'password', 'email', 'level', 'pass', 'user'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
