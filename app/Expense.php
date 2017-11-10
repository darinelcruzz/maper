<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Expense extends Model
{
    protected $fillable = [
        'description', 'date', 'amount', 'type', 'bill',
        'folio', 'method'
    ];

    public function getShortDate($date)
    {
        $fdate = new Date(strtotime($this->$date));
        return $fdate->format('j/M/y, G:i');
    }

    public function getDate($date)
    {
        $fdate = new Date(strtotime($this->$date));
        return $fdate->format('D, j M Y');
    }

    public function getIsChargeAttribute()
    {
        return $this->type == 'cargo';
    }

    public function getIsBilledAttribute()
    {
        return $this->bill == 'si';
    }

    public function getFamountAttribute()
    {
        return '$ ' . number_format($this->amount, 2);
    }
}
