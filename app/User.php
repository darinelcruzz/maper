<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'name', 'password', 'email', 'level', 'pass', 'user'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
