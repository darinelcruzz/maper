<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Service extends Model
{
    protected $fillable = [
        'service','description', 'brand', 'type', 'model',
        'category', 'load', 'plate', 'color', 'inventory',
        'client_id', 'origin', 'destination', 'driver_id',
        'extra_driver', 'helper', 'extra_helper', 'unit_id',
        'date_service', 'date_out', 'date_return', 'amount',
        'ret', 'status', 'maneuver', 'pension', 'bill','others',
        'discount', 'reason', 'pay', 'date_credit',
        'pay_credit', 'view', 'releaser', 'folio', 'lot', 'key',
        'cut_at', 'cut2_at'
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

    function payments()
    {
        return $this->hasMany(Payment::class);
    }

    function scopeService($query, $comparation, $service, $col)
    {
        return $query->where($col, $comparation, $service)->get();
    }

    function scopeUntilDate($query, $start, $column = 'date_out', $end = NULL)
    {
        if ($end == NULL) {
            return $query->whereBetween($column, [$start . ' 00:00:00', $start . ' 23:59:59'])->get();
        }
        return $query->whereBetween($column, [$start . ' 00:00:00', $end . ' 23:59:59'])->get();
    }

    function scopePayType($query, $start, $type, $dateCol, $payCol, $end = NULL)
    {
        if ($end == NULL) {
            return $query->whereBetween($dateCol, [$start . ' 00:00:00', $start . ' 23:59:59'])
                    ->where($payCol, $type)->get();
        }
        return $query->whereBetween($dateCol, [$start . ' 00:00:00', $end . ' 23:59:59'])
                    ->where($payCol, $type)->get();
    }

    function getDays($start, $end)
    {
        $entry = new Date(strtotime($this->$start));
        $interval = $entry->diff($end);
        $interval = $interval->format('%a');
        return $interval;
    }

    function getTotalAttribute()
    {
        return $this->amount + $this->maneuver + $this->pension + $this->others - $this->discount;
    }

    function getDebtAttribute()
    {
        return $this->total - ($this->status == 'abonos' ? $this->payments->sum('amount') : 0 );
    }

    function getStatusLabelAttribute()
    {
        $colors = ['pagado' => 'success', 'liquidado' => 'success', 'credito' => 'primary', 'pendiente' => 'warning', 'vencida' => 'danger', 'abonos' => 'warning'];
        $color = array_key_exists($this->status, $colors) ? $colors[$this->status] : 'default';
        return "<label class='label label-$color'>" . strtoupper($this->status) . "</label>";
    }

    function scopeUntilDateWhere($query, $date, $column = 'date_out', $colWhere = 'status', $data = 'credito' ,$condition = '=!')
    {
        return $query->whereBetween($column, [$date . ' 00:00:00', $date . ' 23:59:59'])
                        ->where($colWhere,$condition,$data)->get();
    }

    function scopeFromDateToDate($query, $startDate, $endDate, $driver, $type)
    {
        return $query->whereBetween('date_service', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
                        ->where($type, $driver->id)
                        ->where('extra_driver', '>', 0)->get();
    }

}
