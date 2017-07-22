<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone',
    	'email', 'contact', 'rfc', 'city'
    ];
}
