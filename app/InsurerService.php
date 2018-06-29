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

    function scopeUntilDate($query, $start, $column = 'date_out', $end = NULL)
    {
        if ($end == NULL) {
            return $query->whereBetween($column, [$start . ' 00:00:00', $start . ' 23:59:59'])->get();
        }
        return $query->whereBetween($column, [$start . ' 00:00:00', $end . ' 23:59:59'])->get();

    }

    function scopePayType($query, $start, $type, $dateCol, $payCol, $end=NULL)
    {
        if ($end == NULL) {
            return $query->whereBetween($dateCol, [$start . ' 00:00:00', $start . ' 23:59:59'])->get();
        }
        return $query->whereBetween($dateCol, [$start . ' 00:00:00', $end . ' 23:59:59'])->get();
    }

}
