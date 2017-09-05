<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Expense extends Model
{
    protected $guarded = [];

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
}
