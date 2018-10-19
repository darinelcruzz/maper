<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Driver extends Model
{
    protected $fillable = [
        'name', 'nickname', 'start_hour', 'end_hour', 'type', 'base_salary', 'status'
    ];

    function services()
    {
        return $this->hasMany(Service::class);
    }

    function getHour($hour)
    {
        $fhour = new Date(strtotime($this->$hour));
        return $fhour->format('h:i a');
    }
}
