<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone', 
    	'email', 'contact', 'rfc', 'city'
    ];
}
