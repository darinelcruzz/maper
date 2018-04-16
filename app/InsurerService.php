<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsurerService extends Model
{
    protected $guarded = [];

    function insurer()
    {
        return $this->belongsTo(Insurer::class);
    }

    function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    function getTotalAttribute()
    {
        return $this->amount + $this->maneuver + $this->pension + $this->others - $this->discount;
    }

    function scopeUntilDate($query, $date, $column = 'date_out')
    {
        return $query->whereBetween($column, [$date . ' 00:00:00', $date . ' 23:59:59'])->get();
    }

    function scopePayType($query, $date, $type, $dateCol, $payCol)
    {
        return $query->whereBetween($dateCol, [$date . ' 00:00:00', $date . ' 23:59:59'])
                    ->where($payCol, $type)->get();
    }
    
}
