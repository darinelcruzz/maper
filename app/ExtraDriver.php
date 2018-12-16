<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraDriver extends Model
{
    protected $fillable = [
        'service_id', 'insurer_service_id','driver_id', 'extra', 'type'
    ];

    function service()
    {
        return $this->belongsTo(Service::class);
    }

    function insurerService()
    {
        return $this->belongsTo(InsurerService::class);
    }

    function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
