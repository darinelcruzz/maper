<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $guarded = [];

    function driver()
    {
        return $this->hasMany(Driver::class, 'driver');
    }
}
