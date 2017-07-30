<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function unitr()
    {
    	return $this->belongsTo(Unit::class, 'unit');
    }
}
