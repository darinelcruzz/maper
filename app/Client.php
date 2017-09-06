<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone',
    	'email', 'contact', 'rfc', 'city'
    ];

    function getShortNameAttribute()
    {
        if (strlen($this->name) > 30) {
            return substr($this->name, 0, 30) . "...";
        }

        return $this->name;
    }

}
