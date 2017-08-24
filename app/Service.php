<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Service extends Model
{
    protected $guarded = [];

    function driverr()
    {
        return $this->belongsTo(Driver::class, 'driver');
    }

    function unitr()
    {
        return $this->belongsTo(Unit::class, 'unit');
    }

    function pricer()
    {
        return $this->belongsTo(Price::class, 'category');
    }

    function clientr()
    {
        return $this->belongsTo(Client::class, 'client');
    }

    public function scopeService($query, $comparation, $service, $col)
    {
        return $query->where($col, $comparation, $service)->get();
    }

    public function scopePayType($query, $date, $type)
    {
        return $query->whereBetween('date_out', [$date . ' 00:00:00', $date . ' 23:59:59'])
                            ->where('status', '!=', 'credito')
                            ->where('pay', $type)->get();
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
    public function getFormattedDateOutAttribute()
    {
        $date = new Date(strtotime($this->date_out));

        return $date->format('l, j F Y h:i a');
    }


    public function getShortDateAttribute()
    {
        $date = new Date(strtotime($this->date_service));

        return $date->format('j/M/y, G:i');
    }
    public function getShortDateOutAttribute()
    {
        $date = new Date(strtotime($this->date_out));

        return $date->format('j/M/y, G:i');
    }

    public function getTotalAttribute()
    {
        return $this->amount + $this->maneuver + $this->pension + $this->others - $this->discount;
    }
}
