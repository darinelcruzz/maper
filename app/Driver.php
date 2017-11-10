<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Driver extends Model
{
    protected $fillable = [
        'name', 'start_hour', 'end_hour'
    ];

    function services()
    {
        return $this->hasMany(Service::class, 'driver');
    }

    function getHour($hour)
    {
        $fhour = new Date(strtotime($this->$hour));
        return $fhour->format('h:i a');
    }

}
