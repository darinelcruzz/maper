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

    function helperr()
    {
        return $this->belongsTo(Driver::class, 'helper');
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

    public function scopePayType($query, $date, $type, $dateCol, $payCol)
    {
        return $query->whereBetween($dateCol, [$date . ' 00:00:00', $date . ' 23:59:59'])
                    ->where($payCol, $type)->get();
    }

    public function getDate($date)
    {
        $fdate = new Date(strtotime($this->$date));
        return $fdate->format('l, j F Y h:i a');
    }

    public function getShortDate($date)
    {
        $fdate = new Date(strtotime($this->$date));
        return $fdate->format('j/M/y, G:i');
    }

    function getDays($date)
    {
        $today = Date::now();
        $entry = new Date(strtotime($this->$date));
        $interval = $entry->diff($today);
        $interval = $interval->format('%a');
        return $interval;
    }

    public function getTotalAttribute()
    {
        return $this->amount + $this->maneuver + $this->pension + $this->others - $this->discount;
    }

}
