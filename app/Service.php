<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use App\Traits\DatesTrait;

class Service extends Model
{
    use DatesTrait;

    protected $guarded = [];

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

    function invoice()
    {
        return $this->belongsTo(Invoice::class, 'bill');
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

    // function getDays($start, $end)
    // {
    //     $entry = new Date(strtotime($this->$start));
    //     if (is_string($end)) {
    //         $end = new Date(strtotime($this->$end));
    //     }
    //     $interval = $entry->diff($end);
    //     $interval = $interval->format('%a');
    //
    //     if($end->format('His') < $entry->format('His')) {
    //         $penalty = $interval + 2;
    //     } else {
    //         $penalty = $interval + 1;
    //     }
    //     return $penalty;
    // }

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
        $status = $this->released_at != null ? 'liberado': $this->status;
        $colors = ['pagado' => 'success', 'liquidado' => 'success', 'credito' => 'primary', 'pendiente' => 'warning', 'abonos' => 'warning'];
        $color = array_key_exists($status, $colors) ? $colors[$status] : 'default';
        return "<label class='label label-$color'>" . strtoupper($status) . "</label>";
    }

    function scopeUntilDateWhere($query, $date, $column = 'date_out', $colWhere = 'status', $data = 'credito' ,$condition = '=!')
    {
        return $query->whereBetween($column, [$date . ' 00:00:00', $date . ' 23:59:59'])
                        ->where($colWhere,$condition,$data)->get();
    }

    function scopeFromDateToDate($query, $startDate, $endDate, $data, $colWhere, $column = 'date_service')
    {
        return $query->whereBetween($column, [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
                        ->where($colWhere, $data)->get();
    }

    function getExpired($start, $end, $allow=0)
    {
        $days = $this->getDays($start, $end) - $allow;
        if ($days > 0) {
            $color = '#FF0000';
        }elseif ($days > -3) {
            $color = '#FFFF00';
        }else {
            $color = '#00FF00';
        }
        return $days . "  <i style='color:$color' class='fa fa-circle'></i>";
    }

}
