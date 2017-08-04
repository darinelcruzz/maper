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

    public function scopeService($query, $comparation, $service)
    {
        return $query->where('service', $comparation, $service)->get();
    }

    public function getFormattedDateAttribute()
    {
        $date = new Date(strtotime($this->date_service));

        return $date->format('l, j F Y h:i a');
    }
    public function getFormattedDateReturnAttribute()
    {
        $date = new Date(strtotime($this->date_return));

        return $date->format('l, j F Y h:i a');
    }
    public function getShortDateAttribute()
    {
        $date = new Date(strtotime($this->date_service));

        return $date->format('j F y, h:i a');
    }
}
