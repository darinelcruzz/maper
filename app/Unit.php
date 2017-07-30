<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = [];

    function service()
    {
        return $this->hasMany(Service::class, 'service');
    }
}
