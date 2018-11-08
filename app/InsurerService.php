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

    function helperr()
    {
        return $this->belongsTo(Driver::class, 'helper');
    }

    function getTotalAttribute()
    {
        return $this->amount + $this->maneuver + $this->pension + $this->others - $this->discount;
    }

    function getStatusLabelAttribute()
    {
        $colors = ['pagado' => 'success', 'credito' => 'primary', 'pendiente' => 'warning', 'vencida' => 'danger'];
        $color = array_key_exists($this->status, $colors) ? $colors[$this->status] : 'default';
        return "<label class='label label-$color'>" . strtoupper($this->status) . "</label>";
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
            return $query->whereBetween($dateCol, [$start . ' 00:00:00', $start . ' 23:59:59'])
                            ->where($payCol, $type)->get();
        }
        return $query->whereBetween($dateCol, [$start . ' 00:00:00', $end . ' 23:59:59'])
                            ->where($payCol, $type)->get();
    }

    function scopeFromDateToDate($query, $startDate, $endDate, $driver, $type)
    {
        return $query->whereBetween('date_assignment', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
                        ->where($type, $driver->id)
                        ->where('extra_driver', '>', 0)->get();
    }

}
