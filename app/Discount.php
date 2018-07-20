<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['reason', 'amount', 'discounted_at', 'driver_id'];

    function driver()
    {
    	return $this->belongsTo(Driver::class);
    }
}
