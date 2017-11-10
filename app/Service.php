<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Service extends Model
{
    protected $fillable = [
        'service','description', 'brand', 'type', 'model',
        'category', 'load', 'plate', 'color', 'inventory',
        'key', 'client', 'origin', 'destination', 'driver',
        'extra_driver', 'helper', 'extra_helper', 'unit',
        'date_service', 'date_out', 'date_return', 'amount',
        'ret', 'status', 'lot', 'maneuver', 'pension', 'releaser',
        'bill', 'others', 'discount', 'reason', 'pay', 'date_credit',
        'pay_credit', 'view'
    ];

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

    function getWeekDayAttribute()
    {
        $date = new Date(strtotime($this->date_service));
        return $date->format('l');
    }

    public function getShortDate($date)
    {
        $fdate = new Date(strtotime($this->$date));
        return $fdate->format('j/M/y, h:i a');
    }

    public function getHour($date)
    {
        $fdate = new Date(strtotime($this->$date));
        return $fdate->format('h:i a');
    }

    public function getWeekDate($date)
    {
        $fdate = new Date(strtotime($this->$date));
        return $fdate->format('D j, M');
    }

    function getDays($date)
    {
        $today = Date::now();
        $entry = new Date(strtotime($this->$date));
        $interval = $entry->diff($today);
        $interval = $interval->format('%a');
        return $interval;
    }

    function getInScheduleAttribute()
    {
        $startDate = substr($this->date_service, 0, 10);
        $endDate = substr($this->date_return, 0, 10);
        $isSameDate = $startDate == $endDate;

        $driverEndHour = $this->driverr->end_hour;
        if ($isSameDate && $this->week_day == 'sábado') {
            $driverEndHour = '14:00:00';
        }

        $startHour = substr($this->date_service, 11);
        $endHour = substr($this->date_return, 11);
        $inSchedule = $startHour >= $this->driverr->start_hour && $endHour <= $driverEndHour;

        return $isSameDate && $inSchedule && $this->week_day != 'domingo';
    }

    public function getTotalAttribute()
    {
        return $this->amount + $this->maneuver + $this->pension + $this->others - $this->discount;
    }

    function scopeUntilDate($query, $date, $column = 'date_out', $status = 'cancelado')
    {
        return $query->whereBetween($column, [$date . ' 00:00:00', $date . ' 23:59:59'])
                    ->where('status', '!=', $status)->get();
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
