<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Service extends Model
{
    protected $fillable = [
        'service','description', 'brand', 'type', 'model',
        'category', 'load', 'plate', 'color', 'inventory',
        'key', 'client_id', 'origin', 'destination', 'driver_id',
        'extra_driver', 'helper', 'extra_helper', 'unit_id',
        'date_service', 'date_out', 'date_return', 'amount',
        'ret', 'status', 'lot', 'maneuver', 'pension', 'releaser',
        'bill', 'others', 'discount', 'reason', 'pay', 'date_credit',
        'pay_credit', 'view'
    ];

    function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    function client()
    {
        return $this->belongsTo(Client::class);
    }

    function helperr()
    {
        return $this->belongsTo(Driver::class, 'helper');
    }

    function pricer()
    {
        return $this->belongsTo(Price::class, 'category');
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

    function scopeUntilDate($query, $date, $column = 'date_out')
    {
        return $query->whereBetween($column, [$date . ' 00:00:00', $date . ' 23:59:59'])->get();
    }

    function scopeUntilDateWhere($query, $date, $column = 'date_out', $colWhere = 'status', $data = 'credito' ,$condition = '=!')
    {
        return $query->whereBetween($column, [$date . ' 00:00:00', $date . ' 23:59:59'])
                        ->where($colWhere,$condition,$data)->get();
    }

    function scopeFromDateToDate($query, $startDate, $endDate, $driver, $type)
    {
        return $query->whereBetween('date_service', [$startDate->format('Y-m-d 00:00:00'), $endDate->format('Y-m-d 23:59:59')])
                        ->where($type, $driver->id)->get();
    }

    function scopePayed($query)
    {
        return $query->where('status', '!=' , 'pendiente' )
                        ->where('status', '!=' , 'cancelado' )
                        ->where('status', '!=' , 'corralon' )->get();
    }

}
