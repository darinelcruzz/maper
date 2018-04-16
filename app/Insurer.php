<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Insurer extends Model
{
    protected $fillable = ['name', 'business_name', 'rfc', 'address', 'phone'];

    function services()
    {
        return $this->hasMany(InsurerService::class, 'insurer_id');
    }

    function getPaidServicesAttribute()
    {
        return $this->services->where('status', 'pagado');
    }

    function getExpiredServicesAttribute()
    {
        return $this->services->where('status', 'vencida');
    }

    function getCreditServicesAttribute()
    {
        return $this->services->where('status', 'credito');
    }

    function getPendingAttribute()
    {
        return count($this->credit_services) + count($this->expired_services);
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
