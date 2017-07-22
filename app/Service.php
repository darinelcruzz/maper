<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name', 'address', 'phone',
        'email', 'contact', 'rfc', 'city'
    ];
}
