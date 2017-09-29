<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Client extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone',
    	'email', 'contact', 'rfc', 'city'
    ];

    function getShortNameAttribute()
    {
        if (strlen($this->name) > 20) {
            return substr($this->name, 0, 20) . "...";
        }

        return $this->name;
    }

    function services()
    {
        return $this->hasMany(Service::class, 'client');
    }

    function getPaidServicesAttribute()
    {
        return $this->services->where('status', 'pagado');
    }

    function getExpiredServicesAttribute()
    {
        return $this->services->where('status', 'vencida');
    }

    function getPendingServicesAttribute()
    {
        return $this->services->where('status', 'credito');
    }

    function getPendingAttribute()
    {
        return count($this->pending_services) + count($this->expired_services);
    }

    function serviceTotal($status, $formatted = false) {
        $sattribute = $status . "_services";
        $total = 0;

        foreach ($this->$sattribute as $service) {
            $total += $service->total;
        }

        if ($formatted) {
            return '$ ' . number_format($total, 2, '.', ',');
        }

        return $total;
    }

}
