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
}
