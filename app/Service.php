<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Service extends Model
{
    protected $guarded = [];

    public function unitr()
    {
    	return $this->belongsTo(Unit::class, 'unit');
    }

    public function scopeService($query, $service)
    {
        return $query->where('service', $service)->get();
    }

    public function getFormattedDateAttribute()
    {
        $date = new Date(strtotime($this->date));

        return $date->format('l j F Y h:i a');
    }
}
